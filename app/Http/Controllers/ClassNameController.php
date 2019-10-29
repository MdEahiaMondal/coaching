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
        return redirect()->back()->with('success', 'Class Added Successfully  Done!');

    }


    public function edit($id)
    {
        $class = ClassName::find($id);

        return view('backend.settings.class.edit', compact('class'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $class = ClassName::find($id);

        $class->name = $request->name;
        $class->save();

        return redirect()->route('class.index')->with('success', 'School Name Update successfully Done!!');
    }


    public function classUnpublish($id){
        $class = ClassName::find($id);

        $class->status = 0;
        $class->save();

        return back()->with('success', 'Publication status Unpublish Successfully');
    }

    public function classPublish($id){
        $class = ClassName::find($id);

        $class->status = 1;
        $class->save();

        return back()->with('success', 'Publication status Publish Successfully');
    }



}
