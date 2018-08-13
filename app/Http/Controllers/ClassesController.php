<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassesController extends Controller
{
    //
    
    public function info_maintain()
    {
        return view('classes.info_maintain');
    }

    

    public function class_course_setting()
    {
        return view('classes.class_course_setting');
    }

    

    public function classrooms_setting()
    {
        return view('classes.classrooms_setting');
    }
    
    public function class_students_setting()
    {
        return view('classes.class_students_setting');
    }
}
