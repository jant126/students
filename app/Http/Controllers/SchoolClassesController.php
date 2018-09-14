<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\User;
use App\Models\Institution;
use Auth;
use Illuminate\Http\Request;


class SchoolClassesController extends Controller
{
    //
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
            return view('schoolclasses.create',compact('institutions'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'class_name' => 'required',
            'institution_id' => 'required',
            'class_start' => 'required',
            'class_end' => 'required'
        ]);
        $schoolclass = SchoolClass::create([
            'institution_id' => $request->institution_id,
            'institution_name' => $request->institution_name,
            'class_name' => $request->class_name,
            'class_count' =>  $request->class_count,
            'class_content' => $request->class_content,
            'class_start' => $request->class_start,
            'class_end' => $request->class_end
        ]);
        // Auth::login($user);
        session()->flash('success','班级添加成功！班级信息如下：');
        return redirect()->route('schoolclasses.show',[$schoolclass]);
    }
    public  function edit(SchoolClass $schoolclass){
        $institutions = Institution::where('user_id','=',Auth::user()->id)->get();
        $currentModel = $schoolclass;
        return view('schoolclasses.edit',compact('schoolclass','institutions','currentModel'));
    }
    public function show(SchoolClass $schoolclass)
    {
//        dump($schoolclass);
        return view('schoolclasses.show', compact('schoolclass'));
    }
    public function index(){
        $schoolclasses = User::find(Auth::user()->id)->schoolclasses()->paginate(10);
        if ($schoolclasses->count() == 0) {
            session()->flash('info', '暂无班级信息，请先增加班级信息！');
            return redirect()->route('schoolclasses.create');
        }
        return view('schoolclasses.index',compact('schoolclasses'));
    }
    public function update(SchoolClass $schoolclass, Request $request){
        $this->validate($request,[
            'class_name' => 'required',
            'institution_id' => 'required',
            'class_start' => 'required',
            'class_end' => 'required'
        ]);
        $data = [];
        $data['institution_name'] = $request->institution_name;
        $data['institution_id'] = $request->institution_id;
        $data['class_name'] = $request->class_name;
        $data['class_count'] = $request->class_count;
        $data['class_content'] = $request->class_content;
        $data['class_start'] = $request->class_start;
        $data['class_end'] = $request->class_end;
        $schoolclass->update($data);
        session()->flash('success', '班级信息更新成功！');
        return redirect()->route('schoolclasses.show', $schoolclass);
    }
    public function destroy(SchoolClass $schoolclass){
        // $user_name = $user->name;
        //$this->authorize('destroy',$user);
        $schoolclass->delete();
        session()->flash('success','成功删除班级：'.$schoolclass->class_name);
        return view('schoolclasses.index');
    }
//    public function info_maintain()
//    {
//        return view('classes.info_maintain');
//    }
//
//
//
//    public function class_course_setting()
//    {
//        return view('classes.class_course_setting');
//    }
//
//
//
//    public function classrooms_setting()
//    {
//        return view('classes.classrooms_setting');
//    }
//
//    public function class_students_setting()
//    {
//        return view('classes.class_students_setting');
//    }
}
