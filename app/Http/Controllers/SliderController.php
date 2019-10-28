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

    public function photoGallery()
    {
        $sliders = Slider::all();
        return view('backend.slider.photo-gallery', compact('sliders'));
    }


    public function sliderEdit($id)
    {
        $slider = Slider::find($id);
        return view('backend.slider.edit', compact('slider'));
    }


    public function sliderUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->status = $request->status;
        if ($request->file('image')){
            unlink('backend/slider-images/'.$slider->image);
            $slider->image = $this->slideImage($request);
        }

        $slider->save();
        return redirect()->route('slider-manage')->with('success', 'Slider Update Successfully !!');
    }


    public function sliderDelete($id)
    {
        $slider = Slider::find($id);
        if ($slider->image != ''){
            unlink('backend/slider-images/'.$slider->image);
        }

        $slider->delete();
        return back()->with('success', 'Slider Deleted Successfully !');
    }

}
