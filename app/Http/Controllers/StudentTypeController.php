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
        $studentTypes = DB::table('student_types')
            ->join('class_names','student_types.class_name_id', '=','class_names.id')
            ->select('student_types.*','class_names.name')->get();

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
        $studentTypes = DB::table('student_types')
            ->join('class_names','student_types.class_name_id', '=','class_names.id')
            ->select('student_types.*','class_names.name')->get();

        return view('backend.settings.studentType.studentTypeList', compact('studentTypes'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\StudentType  $studentType
     * @return \Illuminate\Http\Response
     */
    public function show(StudentType $studentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentType  $studentType
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentType $studentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentType  $studentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentType $studentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentType  $studentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentType $studentType)
    {
        //
    }
}
