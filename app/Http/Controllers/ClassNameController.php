<?php

namespace App\Http\Controllers;

use App\ClassName;
use App\School;
use Illuminate\Http\Request;

class ClassNameController extends Controller
{
    public function index()
    {
        $classs = ClassName::all();
        return view('backend.settings.class.index', compact('classs'));
    }


    public function create()
    {
        return view('backend.settings.class.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = new ClassName();
        $data->name = $request->name;
        $data->status = 1;
        $data->save();
        return redirect()->route('class.index')->with('success', 'Class Added Successfully  Done!');

    }


    public function classUnpublish($id){
        $school = ClassName::find($id);

        $school->status = 0;
        $school->save();

        return back()->with('success', 'Publication status Unpublish Successfully');
    }

    public function classPublish($id){
        $school = ClassName::find($id);

        $school->status = 1;
        $school->save();

        return back()->with('success', 'Publication status Publish Successfully');
    }



}
