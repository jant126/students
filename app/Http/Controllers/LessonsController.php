<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonsController extends Controller
{
    //
    public function create(Course $course){
        return view('lessons.create', compact('course'));
    }

    public function store(Request $request)
    {
        $course_count = $request->course_count;
        for ($i = 0; $i < $course_count; $i++){
            Lesson::create([
                'course_id' => $request->course_id,
                'course_name' => $request->course_name,
                'lesson_index' => $i,
                'lesson_name' => $request->input('lesson_name_'.$i),
                'lesson_date' => substr($request->input('lesson_date_'.$i),0,10) ,
                'lesson_time' => substr($request->input('lesson_date_'.$i),11,8),
                'how_long' => $request->input('how_long_'.$i)
            ]);
        }
        $lessons = Lesson::where('course_id','=',$request->course_id)->get();
        $course = Course::find($request->course_id);
        $course->has_lessons=true;
        $course->save();
        return view('lessons.show', compact('lessons'),compact('course'));
    }
    public  function edit(Course $course){
        $lessons = Lesson::where('course_id','=',$course->id)->get();
        return view('lessons.edit', compact('lessons', 'course'));
}
    public function show(Course $course)
    {
        $lessons = Lesson::where('course_id','=',$course->id)->get();
        return view('lessons.show',compact('lessons'),compact('course'));
    }
    public function index(){

    }
    public function update(Course $course, Request $request){
//        $lessons = Course::find($course->id)->lessons();
        $lessons =Lesson::where('course_id','=',$course->id)->get();
//        $sql = 'update lessons set lesson_name ="'.$request->input('lesson_name_0').
//            '", lesson_date="'.substr($request->input('lesson_date_0'),0,10).
//            '", lesson_time="'.substr($request->input('lesson_date_0'),11,8).
//            '",how_long ="'.$request->input('how_long_0').
//            '" where course_id = 1 and lesson_index = 0';

        foreach($lessons as $lesson){
            $sql = 'update lessons set lesson_name ="'.$request->input('lesson_name_'.$lesson->lesson_index).
                '", lesson_date="'.substr($request->input('lesson_date_'.$lesson->lesson_index),0,10).
                '", lesson_time="'.substr($request->input('lesson_date_'.$lesson->lesson_index),11,8).
                '",how_long ="'.$request->input('how_long_'.$lesson->lesson_index).
                '" where course_id ='.$lesson->course_id.' and lesson_index = '.$lesson->lesson_index;
            DB::update($sql);
//            DB::table('lessons')->where(['course_id' => $lesson->course_id,
//                       'lesson_index' =>$lesson->lesson_index])
//                ->update([
//                    'lesson_name' => $request->input('lesson_name_'.$lesson->lesson_index),
//                    'lesson_date' => substr($request->input('lesson_date_'.$lesson->lesson_index),0,10),
//                    'lesson_time' => substr($request->input('lesson_date_'.$lesson->lesson_index),11,8),
//                    'how_long' =>$request->input('how_long_'.$lesson->lesson_index)
//                ]);
        }
//        $lessons = Course::find($course->id)->lessons();
//        $lessons =Lesson::where('course_id','=',$course->id)->get();
//        foreach($lessons as $lesson){
//            $data=[];
//            $data['lesson_name'] = $request->input('lesson_name_'.$lesson->lesson_index);
//            $data['lesson_date'] = substr($request->input('lesson_date_'.$lesson->lesson_index),0,10);
//            $data['lesson_time'] = substr($request->input('lesson_date_'.$lesson->lesson_index),11,8);
//            $data['how_long'] = $request->input('how_long_'.$lesson->lesson_index);
//            $lesson->update($data);
//        }
        session()->flash('success', '课时信息更新成功！');
        return redirect()->route('lessons.show', $course);
    }
    public function destroy(Course $course){

    }
}
