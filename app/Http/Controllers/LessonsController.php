<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
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
        $course_count = $request->course_count;
        for ($i = 0; $i < $course_count; $i++){
            Lesson::create([
                'course_id' => $request->course_id,
                'lesson_index' => $i,
                'course_name' => $request->course_name,
                'course_name' => $request->course_name,
                'lesson_name' => $request->lesson_name,
                'lesson_date' => substr($request->lesson_date,0,10) ,
                'lesson_time' => substr($request->lesson_date,11,8),
                'how_long' => $request->how_long,
            ]);
        }
        
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
