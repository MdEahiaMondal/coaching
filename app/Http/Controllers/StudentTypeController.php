<?php

namespace App\Http\Controllers;

use App\ClassName;
use App\StudentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentTypeController extends Controller
{

    public function index()
    {
        $studentTypes = $this->getStudentTypeList();
        $classes = ClassName::all();
      return view('backend.settings.studentType.index', compact('studentTypes','classes'));
    }


    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        if ($request->ajax())
        {
            $newdata = new StudentType();
            $newdata->class_name_id = $request->class_id;
            $newdata->student_type = $request->student_type;
            $newdata->status = 1;
            $newdata->save();
        }
    }


    public function studentTypeList()
    {
        $studentTypes = $this->getStudentTypeList();
        return view('backend.settings.studentType.studentTypeList', compact('studentTypes'));
    }

    public function show(StudentType $studentType)
    {

    }


    public function update(Request $request, StudentType $studentType)
    {
        if ($request->ajax())
        {
            $studentType->student_type = $request->student_type;
            $studentType->save();
            $studentTypes = $this->getStudentTypeList();
            return view('backend.settings.studentType.studentTypeList', compact('studentTypes'));
        }else{
            abort(404);
        }
    }


    public function destroy(StudentType $studentType)
    {

        if (request()->ajax())
        {
            if ($studentType)
            {
                $studentType->delete();
                $studentTypes = $this->getStudentTypeList();
                return view('backend.settings.studentType.studentTypeList', compact('studentTypes'));
            }else{
                return response()->json(false, 404);
            }
        }

    }


    public function statusChange(Request $request)
    {
        if (!$request->ajax())
        {
            abort(404);
        }
        $data = StudentType::find($request->studentTypeId);
        if ($data)
        {
            $data->status = $request->status;
            $data->save();
            $studentTypes = $this->getStudentTypeList();
            return view('backend.settings.studentType.studentTypeList', compact('studentTypes'));
        }else{
            return response()->json('false');
        }

    }

    protected function getStudentTypeList()
    {
        $studentTypes = DB::table('student_types')
            ->join('class_names','student_types.class_name_id', '=','class_names.id')
            ->select('student_types.*','class_names.name')
            ->where('student_types.deleted_at', NULL)
            ->get();
        return $studentTypes;
    }

}
