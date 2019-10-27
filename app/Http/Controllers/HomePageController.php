<?php

namespace App\Http\Controllers;

use App\HeaderFooter;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function showForm(){

        $check = HeaderFooter::first();
        if (isset($check)){
            $headerFooter = HeaderFooter::find($check->id);
            return view('backend.pages.manage-header-footer', compact('headerFooter'));
        }else{
            return view('backend.pages.header-footer-form');
        }

    }


    public function headerFooterSave(Request $request)
    {
        $this->headerFooterValidate($request);

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

    public function headerFooterManage($id)
    {
        $headerFooter = HeaderFooter::find($id);
        return view('backend.pages.manage-header-footer', compact('headerFooter'));
    }


    public function headerFooterUpdate(Request $request, $id)
    {
        $this->headerFooterValidate($request);
        $headerFooter = HeaderFooter::find($id);

        $headerFooter->name = $request->name;
        $headerFooter->subTitle = $request->subTitle;
        $headerFooter->address = $request->address;
        $headerFooter->mobile = $request->mobile;
        $headerFooter->copyRight = $request->copyRight;
        $headerFooter->status = $request->status;
        $headerFooter->save();

        return redirect()->route('home')->with('success', 'Header & Footer Uodate Successfully Done !');

    }


    protected function headerFooterValidate($request)
    {
        $request->validate([
            'name' => 'required',
            'subTitle' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'copyRight' => 'required',
        ]);
    }


}
