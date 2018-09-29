<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Institution;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function create(){
        $institutions = Institution::where('user_id','=',Auth::user()->id)->get();
        if (count($institutions)< 1){
            session()->flash('danger','您还没设置机构，请先增加一个机构！');
            return view('institutions.create');
        }
        else
            return view('courses.create',compact('institutions'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'course_name' => 'required',
            'institution_id' => 'required',
            'course_count' => 'required',
        ]);
        $course = Course::create([
            'institution_id' => $request->institution_id,
            'institution_name' => $request->institution_name,
            'course_name' => $request->course_name,
            'course_count' =>  $request->course_count,
            'course_content' => $request->course_content,
        ]);
        // Auth::login($user);
        session()->flash('success','课程添加成功！课程信息如下：');
        return redirect()->route('courses.show',[$course]);
    }
    public  function edit(Course $course){
        $institutions = Institution::where('user_id','=',Auth::user()->id)->get();
        $currentModel = $course;
        return view('courses.edit',compact('course','institutions','currentModel'));
    }
    public function show(Course $course)
    {

        return view('courses.show', compact('course'));
    }
    public function index(){
        $courses = User::find(Auth::user()->id)->courses()->orderBy('institution_id')->paginate(10);
        if ($courses->isEmpty()) {
            session()->flash('info', '暂无课程信息,请先增加课程！');
            return redirect()->route('courses.create');
        }
        return view('courses.index',compact('courses'));
    }

    public function displayCourses(){
        $courses = User::find(Auth::user()->id)->courses()->orderBy('institution_id')->paginate(10);
        if ($courses->isEmpty())
            session()->flash('info', '暂无课程信息！');
        else
            return view('courses.show_courses',compact('courses'));
    }
    public function needLessons(){
        //查找未设置lesson的课程
        $courses = User::find(Auth::user()->id)->courses()
            ->where(function ($query){
            $query->where('has_lessons','=' ,'false');
        })->paginate(10);
        if ($courses->isEmpty()) {
            session()->flash('info', '暂无课程需设置课时！');
            return redirect()->route('courses.index');
        }
        return view('courses.index',compact('courses'));
    }
    public function update(Course $course, Request $request){
        $this->validate($request,[
            'course_name' => 'required',
            'institution_id' => 'required',
            'course_count' => 'required',
        ]);
        $data = [];
        $data['institution_name'] = $request->institution_name;
        $data['institution_id'] = $request->institution_id;
        $data['course_name'] = $request->course_name;
        $data['course_count'] = $request->course_count;
        $data['course_content'] = $request->course_content;
        $course->update($data);
        session()->flash('success', '课程信息更新成功！');
        return redirect()->route('courses.show', $course);
    }
    public function destroy(Course $course){
        // $user_name = $user->name;
        //$this->authorize('destroy',$user);

        $num=DB::table("lessons")->where('course_id','=',$course->id)->delete();//删除多条
        $course->delete();
        session()->flash('success','成功删除课程：'.$course->course_name.'- 删除'.$num.'节课时');
        return redirect()->route('courses.index');
    }
}
