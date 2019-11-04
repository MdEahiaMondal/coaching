<?php

namespace App\Http\Controllers;

use App\Batch;
use App\ClassName;
use Illuminate\Http\Request;

class BatchController extends Controller
{

    public function index()
    {
        $classes = ClassName::where('status', 1)->get();
        return view('backend.settings.batch.index', compact('classes'));
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


    public function fetchData(Request $request)
    {
        $batchs = Batch::where(['class_id' => $request->id])->get();
        return view('backend.settings.batch.class_wise-batch', compact('batchs'));
    }



    public function BatchList($r)
    {
        $id = $r->id;
        $batchs = Batch::where(['class_id' =>$id])->get();
        return view('backend.settings.batch.class_wise-batch', compact('batchs'));
    }


    public function unpublished(Request $request)
    {
        $batch = Batch::find($request->batch_id);
        $batch->status = 0;
        $batch->save();

        $batchs = Batch::where(['class_id' =>$request->class_id])->get();
        return view('backend.settings.batch.class_wise-batch', compact('batchs'));

    }


}
