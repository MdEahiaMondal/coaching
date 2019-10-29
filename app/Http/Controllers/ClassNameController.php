<?php

namespace App\Http\Controllers;

use App\ClassName;
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

}
