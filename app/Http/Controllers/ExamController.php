<?php

namespace App\Http\Controllers;

use App\ClassName;
use App\Exam;
use App\StudentType;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    public function index()
    {
        $classes = ClassName::where('status', 1)->get();
        return view('backend.settings.exam.class_wise_exam_show_form', compact('classes'));
    }


    public function create()
    {
        $classes = ClassName::where('status', 1)->get();
        return view('backend.settings.exam.create', compact('classes'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'class_id' => 'required|numeric',
            'student_type_id' => 'required|numeric',
            'exam_name' => 'required|string',
            'exam_type' => 'required|string',
        ]);
        $exam = new Exam();
        $exam->class_id = $request->class_id;
        $exam->student_type_id = $request->student_type_id;
        $exam->exam_name = $request->exam_name;
        $exam->exam_type = $request->exam_type;
        $exam->exam_status = 1;
        $exam->save();
        return redirect()->back()->with('success', 'Exam created success !!');
    }


    public function show(Exam $exam)
    {
        //
    }


    public function edit(Exam $exam)
    {
        $classes = ClassName::where('status', 1)->get();
        $student_types = StudentType::where('class_name_id', $exam->class_id)
            ->where('deleted_at', null)
            ->where('status', 1)->get();
        return view('backend.settings.exam.edit', compact('exam', 'classes', 'student_types'));
    }


    public function update(Request $request, Exam $exam)
    {
        $this->validate($request, [
            'class_id' => 'required|numeric',
            'student_type_id' => 'required|numeric',
            'exam_name' => 'required|string',
            'exam_type' => 'required|string',
        ]);
        $request['exam_status'] =  0;
        $exam->update($this->createThis($request->all()));
        return redirect()->back()->with('success', 'Exam updated success !!');
    }


    public function destroy(Exam $exam)
    {
        if (!request()->ajax())
        {
            abort(404);
        }
           $old_exam = $exam;
            $exam->delete();
        $exams = $this->getExamLists($old_exam);
        return view('backend.settings.exam.class_wise_exam_lists', compact('exams'));
    }

    public function classWiseStudentType(Request $request)
    {
        if (!$request->ajax())
        {
            abort(404);
        }
        $student_type = StudentType::where('class_name_id', $request->class_id)
            ->where('deleted_at', null)
            ->where('status', 1)->get();

        $output = '<option value="">---Select Course---</option>';
        foreach ($student_type as $type)
        {
            $output .= '<option value="'.$type->id.'">'.$type->student_type.'</option>';
        }
        return $output;
    }

    public function classWiseExamList(Request $request)
    {
        if (!$request->ajax())
        {
            abort(404);
        }
        $exams = $this->getExamLists($request);
         return view('backend.settings.exam.class_wise_exam_lists', compact('exams'));
    }
    public function statusPublishedUnpublished(Request $request)
    {
        if (!$request->ajax())
        {
            abort(404);
        }
        $exam  =Exam::findOrFail($request->exam_id);
        if ($exam)
        {
            $exam->exam_status = $request->status;
            $exam->save();
            $exams = $this->getExamLists($exam);
            return view('backend.settings.exam.class_wise_exam_lists', compact('exams'));
        }
    }

    protected function getExamLists($params)
    {
        $exams = Exam::where([
            'class_id' => $params->class_id,
            'student_type_id' => $params->student_type_id,
            'deleted_at' => null,
        ])->get();
        return $exams;
    }

    private function createThis(array $all)
    {
        $data = [];
       foreach ($all as $key => $value)
       {
           if ($key != '_token' && $key != '_method')
           {
               $data[$key] = $value;
           }
       }
        return $data;
    }
}
