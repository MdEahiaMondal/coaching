<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolManagementController extends Controller
{
    public function addSchool()
    {
        return view('backend.settings.school.create');
    }
}
