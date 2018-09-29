<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class SchedulesController extends Controller
{
    var $teachers,$schoolClasses,$institutions,$courses,$classrooms;
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        $this->institutions = Institution::where('user_id','=',Auth::user()->id)->get();
        if (count( $this->institutions)< 1){
            session()->flash('danger','您还没设置机构，请先增加一个机构！');
            return redirect()->route('institutions.create');
        }
       $result= $this->initSchedule($this->institutions->first());
        if (isset($result))
            return $result;
        return view('schedules.create',['institutions' => $this->institutions,
            'teachers' => $this->teachers,'schoolClasses' => $this->schoolClasses,
            'courses' => $this->courses,'classrooms' => $this->classrooms]);
    }
    public function initSchedule($institution){
        $this->teachers = Institution::find($institution->id)->teachers()->get();
        if (count($this->teachers) < 1){
            session()->flash('danger','当前机构:'.$institution->institution_name.
                ' 还没设置教师，请先增加机构教师！');
            return redirect()->route('teachers.create');
        }
        $this->schoolClasses  = Institution::find($institution->id)
            ->classes()->get();
        if (count($this->schoolClasses) < 1){
            session()->flash('danger','当前机构:'.$institution->institution_name.
                ' 还没设置班级，请先增加班级！');
            return redirect()->route('schoolclasses.create');
        }
        $this->courses  = Institution::find($institution->id)
            ->courses()->get();
        if (count($this->courses) < 1){
            session()->flash('danger','当前机构:'.$institution->institution_name.
                ' 还没设置课程，请先增加课程！');
            return redirect()->route('courses.create');
        }

        $this->classrooms  = Institution::find($institution->id)
            ->classrooms()->get();
        if (count($this->classrooms) < 1){
            session()->flash('danger','当前机构:'.$institution->institution_name.
                ' 还没设置教室，请先增加教室！');
            return redirect()->route('classrooms.create');
        }
    }
    public function setSchedule(Institution $institution){
        $this->institutions = Institution::where('user_id','=',Auth::user()->id)->get();
       $result= $this->initSchedule($institution,$this->institutions);
        if (isset($result))
            return $result;
        return json_encode(['teachers' => $this->teachers,'schoolClasses' => $this->schoolClasses,
            'courses' => $this->courses,'classrooms' => $this->classrooms]);
    }
    public function show($institution_id,$class_id,$course_id,$teacher_id)
    {
        $schedule = Schedule::whereRaw('institution_id=? and class_id=? and course_id = ?
        and teacher_id = ?',[$institution_id,$class_id,$course_id,$teacher_id])->first();
        return view('schedules.show', compact('schedule'));
    }
    public function store(Request $request){
        $schedules = Schedule::whereRaw('institution_id=? and class_id=? and course_id = ?
        and teacher_id = ?',[$request->institution_id,$request->class_id,
            $request->course_id,$request->teacher_id,])->get();

            if($schedules->count() > 0)
            {
                session()->flash('success','此教学计划已存在！请重新设置！');
                return redirect()->back();
            }
        $schedule = Schedule::create([
            'institution_id' => $request->institution_id,
            'class_id' =>  $request->class_id,
            'course_id' => $request->course_id,
            'teacher_id' => $request->teacher_id,
            'classroom_id' => $request->classroom_id,
            'institution_name' =>  $request->institution_name,
            'class_name' =>  $request->class_name,
            'course_name' =>  $request->course_name,
            'teacher_name' =>  $request->teacher_name,
            'classroom_name' => $request->classroom_name,
        ]);

//        // Auth::login($user);
        session()->flash('success','教学计划添加成功！教学计划信息如下：');
        return view('schedules.show',compact('schedule'));
    }
    public  function edit($institution_id,$class_id,$course_id,$teacher_id){
        $schedule = Schedule::whereRaw('institution_id=? and class_id=? and course_id = ?
        and teacher_id = ?',[$institution_id,$class_id,$course_id,$teacher_id])->first();
        $this->institutions = Institution::where('user_id','=',Auth::user()->id)->get();
        $institution = Institution::find($institution_id);
//        dump($institution);
        $result= $this->initSchedule($institution);
        if (isset($result))
            return $result;
//        dump($this->teachers, $schedule);
        return view('schedules.edit',['institutions' => $this->institutions,
            'teachers' => $this->teachers,'schoolClasses' => $this->schoolClasses,
            'courses' => $this->courses,'classrooms' => $this->classrooms,
            'currentModel' => $schedule]);
//        return view('schedules.edit',compact('schedule'));
    }
    public  function update(Request $request){

        $schedules = Schedule::whereRaw('institution_id=? and class_id=? and course_id = ? and teacher_id = ?',
            [$request->institution_id,$request->class_id,$request->course_id,$request->teacher_id])->get();
        if($schedules->count() > 0)
        {
            session()->flash('success','此教学计划已存在！请重新设置！');
            return redirect()->back();
        }

        Schedule::whereRaw('institution_id=? and class_id=? and course_id = ?
        and teacher_id = ?',[$request->original_institution_id,$request->original_class_id,
            $request->original_course_id,$request->original_teacher_id])->delete();

        $schedule = Schedule::create([
            'institution_id' => $request->institution_id,
            'class_id' =>  $request->class_id,
            'course_id' => $request->course_id,
            'teacher_id' => $request->teacher_id,
            'classroom_id' => $request->classroom_id,
            'institution_name' =>  $request->institution_name,
            'class_name' =>  $request->class_name,
            'course_name' =>  $request->course_name,
            'teacher_name' =>  $request->teacher_name,
            'classroom_name' => $request->classroom_name,
        ]);

//        // Auth::login($user);
        session()->flash('success','教学计划修改成功！新教学计划信息如下：');
        return view('schedules.show',compact('schedule'));

    }
    public function index(){
        $schedules = User::find(Auth::user()->id)->schedules()
            ->orderBy('institution_id')->orderBy('class_id')
            ->orderBy('course_id')->orderBy('teacher_id')->paginate(10);
        if ($schedules->isEmpty()) {
            session()->flash('info', '暂无教学计划,请先教学计划！');
            return redirect()->route('schedules.create');
        }
        return view('schedules.index',compact('schedules'));
    }
    public function displaySchedules(){
        $schedules = User::find(Auth::user()->id)->schedules()
            ->orderBy('institution_id')->orderBy('class_id')
            ->orderBy('course_id')->orderBy('teacher_id')->paginate(10);
        if ($schedules->isEmpty())
            session()->flash('info', '暂无教学计划！');
        else
            return view('schedules.show_schedules',compact('schedules'));
    }
    public function destroy($institution_id,$class_id,$course_id,$teacher_id){
      Schedule::whereRaw('institution_id=? and class_id=? and course_id = ?
        and teacher_id = ?',[$institution_id,$class_id,$course_id,$teacher_id])->delete();

        session()->flash('success','成功删除教学计划！');
        return redirect()->route('schedules.index');
    }
}
