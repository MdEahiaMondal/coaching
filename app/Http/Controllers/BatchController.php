<?php

namespace App\Http\Controllers;

use App\Batch;
use App\ClassName;
use Brian2694\Toastr\Facades\Toastr;
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


    public function destroy(Request $request, Batch $batch)
    {
       $batch->delete();
      /*  Toastr::success('Batch Deleted Successfully Done', 'Success');*/
        return $this->ClassWiseBatch($request);
    }


    public function ClassWiseBatch($r)
    {
        $class_id = $r->class_id;
        $batchs = Batch::where(['class_id' =>$class_id])->get();
        return view('backend.settings.batch.class_wise-batch', compact('batchs'));
    }


    public function fetchData(Request $request)
    {
        return $this->ClassWiseBatch($request);
    }


    public function BatchData($r)
    {
        return Batch::find($r->batch_id);
    }

    public function unpublished(Request $request)
    {
        $batch = $this->BatchData($request);
        $batch->status = 0;
        $batch->save();
        return $this->ClassWiseBatch($request);
    }


    public function published(Request $request)
    {
        $batch = $this->BatchData($request);
        $batch->status = 1;
        $batch->save();
       return $this->ClassWiseBatch($request);
    }



}
