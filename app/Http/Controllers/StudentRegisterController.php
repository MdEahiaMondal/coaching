<?php

namespace App\Http\Controllers;

use App\Batch;
use App\ClassName;
use App\Http\Requests\StudentRegisterRequest;
use App\School;
use App\StudentRegister;
use App\StudentType;
use App\StudentTypeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Image;

class StudentRegisterController extends Controller
{

    public function index()
    {
        $students = DB::table('student_registers')
            ->join('schools', 'student_registers.school_id', '=', 'schools.id')
            ->join('class_names', 'student_registers.class_id', '=', 'class_names.id')
            ->select('student_registers.*', 'schools.school_name', 'class_names.class_name')
            ->where('student_registers.student_register_status', '=', 1)
            ->get();
        return view('backend.student.student_lists.running_students', compact('students'));
    }


    public function create()
    {
        $calsses =ClassName::where('status', 1)->get();
        $schools = School::where('status', 1)->get();
        return view('backend.student.register.student_form', compact('calsses', 'schools'));
    }

    public function store(StudentRegisterRequest $request)
    {
       $student_register = StudentRegister::create([
           'student_name' => $request->student_name,
           'school_id' => $request->school_id,
           'class_id' => $request->class_id,
           'father_name' => $request->father_name,
           'father_mobile' => $request->father_mobile,
           'father_profession' => $request->father_profession,
           'mother_name' => $request->mother_name,
           'mother_mobile' => $request->mother_mobile,
           'mother_profession' => $request->mother_profession,
           'email_address' => $request->email_address,
           'sms_mobile' => $request->sms_mobile,
           'date_of_admission' => $request->date_of_admission,
           'student_photo' => $request->student_photo,
           'address' => $request->address,
           'student_register_status' => $request->status,
           'password' => $request->sms_mobile,
           'encrypt_password' => Hash::make( $request->sms_mobile),
           'created_by' => Auth::id(),
           'updated_by' => Auth::id(),
       ]);
       $student_type = $request->student_type_id;

       foreach ($student_type as $key => $value)
       {
           StudentTypeDetail::create([
               'student_register_id' => $student_register->id,
               'class_id' => $request->class_id,
               'student_type_id' => $value,
               'batch_id' => $request->batch_id[$key],
               'roll_no' => $request->student_roll[$key],
               'student_type_detail_status' => 1,
           ]);
       }

        if ($request->has('student_photo'))
        {
            $this->uploadPhoto($student_register, $request);
        }

       return redirect()->back()->with('success', 'Student registration success');

    }


    public function show($student_id)
    {
       $students = $this->singleStudentInfo($student_id);
        $schools = School::where('status', 1)->get();
       return view('backend.student.profiles.profile',  compact('students', 'schools'));
    }


    public function edit(StudentRegister $studentRegister)
    {
        //
    }


    public function update(StudentRegisterRequest $request, $id)
    {
        $student = StudentRegister::findOrFail($id);
        $student->student_name = $request->student_name;
        $student->school_id = $request->school_id;
        $student->father_name = $request->father_name;
        $student->father_mobile = $request->father_mobile;
        $student->father_profession = $request->father_profession;
        $student->mother_name = $request->mother_name;
        $student->mother_mobile = $request->mother_mobile;
        $student->mother_profession = $request->mother_profession;
        $student->email_address = $request->email_address;
        $student->sms_mobile = $request->sms_mobile;
        $student->date_of_admission = $request->date_of_admission;
        $student->address = $request->address;
        if ($request->has('student_photo'))
        {
            $this->updateStudentPhoto($student, $request);
        }
        $student->save();
        return redirect()->back()->with('success', 'Student successfully updated');
    }

    public function destroy(StudentRegister $studentRegister)
    {
        //
    }

    public function classWiseStudentTypeShow(Request $request)
    {
        $student_types = StudentType::where('class_name_id', $request->class_id)
            ->where('deleted_at', null)
            ->where('status', 1)->get();
        $calsses =ClassName::where('status', 1)->get();
        $class_id = $request->class_id;
        return view('backend.student.register.student_type_lists', compact('student_types', 'calsses', 'class_id'));

    }

    public function classAndStudentTypeWiseBatchTypeShow(Request $request)
    {
        $student_type = StudentType::where([ 'id' => $request->student_type_id, 'class_name_id' => $request->class_id])
            ->where('deleted_at', null)
            ->where('status', 1)->first();

        $batches = Batch::where([ 'student_type_id' => $request->student_type_id,'class_id' => $request->class_id])
            ->where('status', 1)->get();
        return view('backend.student.register.batch-roll-form', compact('student_type', 'batches'));
    }

    public function classWiseStudentFormShow()
    {
        $classes = ClassName::where('status', 1)->get();
        return view('backend.student.student_lists.class_wise_student_form', compact('classes'));
    }

    public function classWiseStudentTypeShowForStudents(Request $request)
    {
        $student_type = StudentType::where('class_name_id', $request->class_id)
            ->where('deleted_at', null)
            ->where('status', 1)->get();

        $output = '<option value="">---Select Type---</option>';
        foreach ($student_type as $type)
        {
            $output .= '<option value="'.$type->id.'">'.$type->student_type.'</option>';
        }
        return $output;
    }

    public function classAndStudentTypeWiseStudentsShow(Request $request)
    {
        $students = DB::table('student_registers')
            ->join('schools', 'student_registers.school_id', '=', 'schools.id')
            ->join('student_type_details', 'student_type_details.student_register_id', '=', 'student_registers.id')
            ->join('batches', 'student_type_details.batch_id', '=', 'batches.id')
            ->where([
                'student_registers.student_register_status' => 1,
                'student_type_details.student_type_detail_status' => 1,
                'student_registers.class_id' => $request->class_id,
                'student_type_details.student_type_id' => $request->student_type_id
            ])
            ->select('student_registers.*', 'schools.school_name', 'batches.batch_name', 'student_type_details.roll_no')
            ->get();
        return view('backend.student.student_lists.class_and_student_type_wise_student_lists', compact('students'));
    }

    protected function singleStudentInfo($id)
    {
        $students = DB::table('student_registers')
            ->join('schools', 'student_registers.school_id', '=', 'schools.id')
            ->join('class_names', 'student_registers.class_id', '=', 'class_names.id')
            ->join('student_type_details', 'student_type_details.student_register_id', '=', 'student_registers.id')
            ->join('student_types', 'student_type_details.student_type_id', '=', 'student_types.id')
            ->join('batches', 'student_type_details.batch_id', '=', 'batches.id')
            ->where([
                'student_registers.student_register_status' => 1,
                'student_registers.id' => $id,
            ])
            ->select('student_registers.*', 'schools.school_name', 'class_names.class_name', 'batches.batch_name', 'student_type_details.roll_no', 'student_types.student_type')
            ->get();
        return $students;
    }

    private function updateStudentPhoto($student, $request)
    {
        if (isset($student->student_photo))
        {
            unlink($student->student_photo);
            $this->uploadPhoto($student, $request);
        }else{
            $this->uploadPhoto($student, $request);
        }
    }

    private function uploadPhoto($student, $request)
    {
        $image = $request->file('student_photo');
        $image_name = uniqid() .'-'.$image->getClientOriginalName() ;
        $directory = 'backend/images/students/';
        $upload_image_url = $directory.$image_name;
        Image::make($image)->resize(300,300)->save($upload_image_url);
        $student->student_photo = $upload_image_url;
        $student->save();
    }

    public function batchWiseStudentsForm()
    {
        $classes = ClassName::where('status', 1)->get();
        return view('backend.student.batch.batch_wise_student_form', compact('classes'));
    }

    public function batchWiseStudentsBatchList(Request $request)
    {
        $batches = Batch::where([
            'class_id' => $request->class_id,
            'student_type_id' => $request->student_type_id,
            'status' => 1,
        ])->get();

        return view('backend.student.batch.batch_lists', compact('batches'));
    }

    public function batchWiseStudentsList(Request $request)
    {
        $students = DB::table('student_registers')
            ->join('schools', 'student_registers.school_id', '=', 'schools.id')
            ->join('student_type_details', 'student_type_details.student_register_id', '=', 'student_registers.id')
            ->join('batches', 'student_type_details.batch_id', '=', 'batches.id')
            ->where([
                'student_registers.student_register_status' => 1,
                'student_type_details.student_type_detail_status' => 1,
                'student_registers.class_id' => $request->class_id,
                'student_type_details.batch_id' => $request->batch_id,
                'student_type_details.student_type_id' => $request->student_type_id
            ])
            ->select('student_registers.*', 'schools.school_name', 'batches.batch_name', 'student_type_details.roll_no')
            ->get();

        return view('backend.student.batch.batch_wise_student_lists', compact('students'));
    }

}
