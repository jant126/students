<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //
    public function create()
    {
        return view('students.create');
    }

    

    public function courses_maintain()
    {
        return view('students.courses_maintain');
    }
}
