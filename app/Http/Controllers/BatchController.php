<?php

namespace App\Http\Controllers;

use App\Batch;
use App\ClassName;
use Illuminate\Http\Request;

class BatchController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $classes = ClassName::where('status', 1)->get();
        return view('backend.settings.batch.create', compact('classes'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required',
            'class_id' =>  'required|numeric',
        ]);


        $batch = new Batch();
        $batch->class_id = $request->class_id;
        $batch->name = $request->name;
        $batch->status = 1;
        $batch->save();

        return redirect()->back()->with('success', 'Batch create Successfully Done!');

    }


    public function show(Batch $batch)
    {
        //
    }


    public function edit(Batch $batch)
    {
        //
    }


    public function update(Request $request, Batch $batch)
    {
        //
    }


    public function destroy(Batch $batch)
    {
        //
    }
}
