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
            'student_capacity' =>  'required|integer',
            'class_id' =>  'required|numeric',
        ]);


        $batch = new Batch();
        $batch->class_id = $request->class_id;
        $batch->name = $request->name;
        $batch->student_capacity = $request->student_capacity;
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
        $classes = ClassName::all();

        return view('backend.settings.batch.edit', compact('classes', 'batch'));
    }


    public function update(Request $request, Batch $batch)
    {

        $this->validate($request, [
            'name'  => 'required|unique:batches,name,'.$batch->id.',id',
            'student_capacity' =>  'required|integer|max:150',
            'class_id' =>  'required|numeric',
        ]);

        $batch->update($request->all());

        Toastr::success('Batch Updated Successfully Done', 'Success');
       return redirect()->back();

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
