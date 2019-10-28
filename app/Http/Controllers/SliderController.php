<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function showForm()
    {
        return view('backend.slider.create');
    }


    public function sliderrSave(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        $data = new Slider();
        $data->image = $this->slideImage($request);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();
       return back()->with('success', 'Slider images Create Successfully Done !');
    }


    protected function slideImage($request)
    {
        $file = $request->file('image');
        $getFileExtension = $file->getClientOriginalExtension();
        $setImageName = rand(). '.' .$getFileExtension;
        $dir = "backend/slider-images/".$setImageName;
        Image::make($file)->resize('1400', '570')->save($dir,'100');
        return $setImageName;
    }


    public function sliderManage()
    {
        $sliders = Slider::all();
        return view('backend.slider.index', compact('sliders'));
    }


    public function sliderUnpublish($id)
    {
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->save();
        return back()->with('success', 'Slider Unpublish Successfully !!');
    }


    public function sliderPublish($id)
    {
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->save();
        return back()->with('success', 'Slider Publish Successfully !!');
    }

}
