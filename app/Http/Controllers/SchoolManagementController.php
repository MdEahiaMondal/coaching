<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class SchoolManagementController extends Controller
{
    public function addSchool()
    {
        return view('backend.settings.school.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $data = new School();
        $data->name = $request->name;
        $data->status = 1;
        $data->save();
        return back()->with('success', 'School Added Successfully Done !');
    }


    public function show()
    {
        $schools = School::all();
        return view('backend.settings.school.index', compact('schools'));
    }

    public function edit($id)
    {
        $school = School::find($id);

        return view('backend.settings.school.edit', compact('school'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $school = School::find($id);

        $school->name = $request->name;
        $school->save();

        return redirect()->route('school-show')->with('success', 'School Name Update successfully Done!!');
    }



    public function schoolUnpublish($id){
        $school = School::find($id);

        $school->status = 0;
        $school->save();

        return back()->with('success', 'Publication status Unpublish Successfully');
    }

      public function schoolPublish($id){
        $school = School::find($id);

        $school->status = 1;
        $school->save();

        return back()->with('success', 'Publication status Publish Successfully');
    }



}
