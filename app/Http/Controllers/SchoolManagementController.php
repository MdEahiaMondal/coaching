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

}
