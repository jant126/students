<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    //
    public function createLessons(Course $course){



        return view('lessons.create_lessons', compact('course'));
    }

    public function store(Request $request)
    {

    }

    public function create(){

    }

    public  function edit(Course $course){
}
    public function show(Course $course)
    {

    }
    public function index(){

    }

    public function update(Course $course, Request $request){

    }
    public function destroy(Course $course){

    }
}
