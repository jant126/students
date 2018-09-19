<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class SchedulesController extends Controller
{
    var $teachers,$schoolClasses,$institutions,$courses;
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        $this->institutions = Institution::where('user_id','=',Auth::user()->id)->get();
        if (count( $this->institutions)< 1){
            session()->flash('danger','您还没设置机构，请先增加一个机构！');
            return redirect()->route('institutions.create');
        }
       $result= $this->initSchedule($this->institutions->first(),$this->institutions);
        if (isset($result))
            return $result;
        return view('schedules.create',['institutions' => $this->institutions,
            'teachers' => $this->teachers,'schoolClasses' => $this->schoolClasses,
            'courses' => $this->courses]);
//        if (count( $institutions)==1){
//            $teachers = Institution::find($institutions->first()->id)->teachers()->get();
//            if (count($teachers) < 1){
//                session()->flash('danger','当前机:'.$institutions->first()->institution_name.
//                    '构还没设置教师，请先增加机构教师！');
//                return redirect()->route('teachers.create');
//            }
//            $schoolClasses  = Institution::find($institutions->first()->id)
//                ->classes()->get();
//            if (count($schoolClasses) < 1){
//                session()->flash('danger','当前机构:'.$institutions->first()->institution_name.
//                    '还没设置班级，请先增加班级！');
//                return redirect()->route('schoolclasses.create');
//            }
//            $courses  = Institution::find($institutions->first()->id)
//                ->courses()->get();
//            if (count($courses) < 1){
//                session()->flash('danger','当前机构:'.$institutions->first()->institution_name.
//                    '还没设置课程，请先增加课程！');
//                return redirect()->route('courses.create');
//            }
//        }
//        return view('schedules.create',compact('institutions',
//        'schoolClasses','teachers','courses'));
    }
    public function initSchedule($institution,$institutions){
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
    }
    public function setSchedule(Institution $institution){
        $this->institutions = Institution::where('user_id','=',Auth::user()->id)->get();
       $result= $this->initSchedule($institution,$this->institutions);
        if (isset($result))
            return $result;
        return view('schedules.create',['institutions' => $this->institutions,
            'teachers' => $this->teachers,'schoolClasses' => $this->schoolClasses,
            'courses' => $this->courses]);
    }
}
