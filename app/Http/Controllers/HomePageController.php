<?php

namespace App\Http\Controllers;

use App\HeaderFooter;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function showForm(){
        return view('backend.pages.header-footer-form');
    }


    public function headerFooterSave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'subTitle' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'copyRight' => 'required',
        ]);

        $data = new HeaderFooter();
        $data->name = $request->name;
        $data->subTitle = $request->subTitle;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->copyRight = $request->copyRight;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('home')->with('success', 'Data Create Successfully Done !');
    }

}
