<?php

namespace App\Http\Controllers;

use App\ClassName;
use App\StudentAttendance;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentAttendanceController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $classes =ClassName::where('status', 1)->get();
        $years = Year::where('status', 1)->get();
        return view('backend.student.attendance.batch_wise_attendance_create', compact('classes', 'years'));
    }


    public function store(Request $request)
    {
        $today = date('Y-m-d');
        $check_exist_attendance = StudentAttendance::where([
            'academic_session' => $request->academic_session,
            'student_type_id' => $request->student_type_id,
            'class_id' => $request->class_id,
            'batch_id' => $request->batch_id,
        ])->whereDate('created_at', $today)->first();
        if ($check_exist_attendance)
        {
            return redirect()->back()->with('error', 'Batch Wise Attendance already crested !');
        }else{
            foreach ($request->attendance as $student_id => $attendance_status)
            {
                StudentAttendance::create([
                    'academic_session' => $request->academic_session,
                    'student_id' => $student_id,
                    'student_type_id' => $request->student_type_id,
                    'class_id' => $request->class_id,
                    'batch_id' => $request->batch_id,
                    'attendance' => $attendance_status,
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id(),
                ]);
            }
            return redirect()->back()->with('success', 'Batch Wise Attendance crested success !');
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function attendanceStudentlists(Request $request)
    {
        $today = date('Y-m-d');
        $check_exist_attendance = StudentAttendance::where([
            'academic_session' => $request->academic_session,
            'student_type_id' => $request->student_type_id,
            'class_id' => $request->class_id,
            'batch_id' => $request->batch_id,
        ])->whereDate('created_at', $today)->first();
        if ($check_exist_attendance)
        {
            return  response()->json(false);
        }else{
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
            return view('backend.student.attendance.attendance_student_list', compact('students'));
        }
    }

    public function batchWiseStudentAttendanceViewForm()
    {
        $classes =ClassName::where('status', 1)->get();
        return view('backend.student.attendance.attendance_view.batch_wise_students_attendance_view_form', compact('classes'));
    }

    public function batchWiseStudentAttendanceViewList(Request $request)
    {
        $attendances = DB::table('student_attendances')
            ->join('student_registers', 'student_attendances.student_id', '=', 'student_registers.id')
            ->join('schools', 'student_registers.school_id', '=', 'schools.id')
            ->join('student_type_details', 'student_registers.id', '=', 'student_type_details.student_register_id')
            ->where([
                'student_type_details.student_type_id' => $request->student_type_id,
                'student_attendances.student_type_id' => $request->student_type_id,
                'student_attendances.batch_id' => $request->batch_id,
                'student_attendances.class_id' => $request->class_id,
            ])->whereDate('student_attendances.created_at', $request->date)
            ->select('student_attendances.*', 'student_registers.student_name', 'student_registers.sms_mobile', 'student_type_details.roll_no', 'schools.school_name')
            ->get();
        return view('backend.student.attendance.attendance_view.batch_wise_student_attendance_viel_list',  compact('attendances'));
    }

    public function batchWiseStudentAttendanceEditForm()
    {
        $classes =ClassName::where('status', 1)->get();
        return view('backend.student.attendance.edit.edit_form', compact('classes'));
    }

    public function batchWiseStudentAttendanceEditList(Request $request)
    {
        $today = date('Y-m-d');
        $attendances = DB::table('student_attendances')
            ->join('student_registers', 'student_attendances.student_id', '=', 'student_registers.id')
            ->join('schools', 'student_registers.school_id', '=', 'schools.id')
            ->join('student_type_details', 'student_registers.id', '=', 'student_type_details.student_register_id')
            ->where([
                'student_type_details.student_type_id' => $request->student_type_id,
                'student_attendances.student_type_id' => $request->student_type_id,
                'student_attendances.batch_id' => $request->batch_id,
                'student_attendances.class_id' => $request->class_id,
            ])->whereDate('student_attendances.created_at',$today)
            ->select('student_attendances.*', 'student_registers.student_name', 'student_registers.sms_mobile', 'student_type_details.roll_no', 'schools.school_name')
            ->get();

        if ($attendances->count() > 0)
        {
            return  view('backend.student.attendance.edit.edit_attendance_student_list', compact('attendances'));
        }else{
            return  response()->json(false);
        }
    }

    public function batchWiseStudentAttendanceUpdate(Request $request)
    {
        foreach ($request->attendance as $id => $attendance)
        {
            $student_attendance = StudentAttendance::where('id', $id)->first();
            $student_attendance->attendance = $attendance;
            $student_attendance->save();
        }
        return redirect()->back()->with('success', 'Batch Wise Attendance updated success !');
    }
}
