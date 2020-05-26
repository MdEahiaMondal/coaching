<?php

namespace App\Http\Controllers;

use App\Year;
use Illuminate\Http\Request;

class DateManagementController extends Controller
{
    public function addYear()
    {
        $current_year = date('Y');

        $check_exist = Year::where('year', '=', $current_year)->first();
        if (!$check_exist)
        {
            $year = new Year();
            $year->year = $current_year;
            $year->status = 1;
            $year->save();
            return redirect()->back()->with('success', 'Date '.$current_year.' created success');
        }else{
            return redirect()->back()->with('error', 'Date '.$current_year.' already exist');
        }

    }
}
