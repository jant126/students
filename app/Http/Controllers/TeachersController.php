<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Institution;
use App\Models\Teacher;
use Auth;
class TeachersController extends Controller
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
            return view('teachers.create',compact('institutions'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'teacher_name' => 'required',
            'institution_id' => 'required',
            'phone' => 'required|unique:users|digits:11'
        ]);
        $teacher = Teacher::create([
            'institution_id' => $request->institution_id,
            'institution_name' => $request->institution_name,
            'teacher_name' => $request->teacher_name,
            'teacher_sex' =>  $request->teacher_sex,
            'teacher_content' => $request->teacher_content,
            'phone' => $request->phone,
            'teacher_WeiXinOpenId' => $request->teacher_WeiXinOpenId
        ]);

        //用学生的手机号码、学生名 创建家长用户，用户类型有：教师用户、家长用户、管理员
        User::createUser($request->teacher_name,$request->phone,User::TeacherUser,Auth::user()->id);
        // Auth::login($user);
        session()->flash('success','教师添加成功！教师信息如下：');
        return redirect()->route('teachers.show',[$teacher]);
    }
    public  function edit(Teacher $teacher){
        $institutions = Institution::where('user_id','=',Auth::user()->id)->get();
        $currentModel = $teacher;
        return view('teachers.edit',compact('teacher','institutions','currentModel'));
    }
    public function show(Teacher $teacher)
    {
//        dump($teacher);
        return view('teachers.show', compact('teacher'));
    }
    public function index(){
        $teachers = User::find(Auth::user()->id)->teachers()
            ->where('teacher_status','=',Teacher::InService)
            ->orderBy('institution_id')->paginate(10);
        if ($teachers->count() == 0) {
            session()->flash('info', '暂无教师信息，请先增加教师！');
            return redirect()->route('teachers.create');
        }
//        dump($teachers);
        return view('teachers.index',compact('teachers'));
    }
    public function displayTeachers(){
        $teachers = User::find(Auth::user()->id)->teachers()
            ->where('teacher_status','=',Teacher::InService)
            ->orderBy('institution_id')->paginate(10);
        if ($teachers->count() == 0)
            session()->flash('info', '暂无教师信息！');
        else
            return view('teachers.show_teachers',compact('teachers'));
    }
    public function update(Teacher $teacher, Request $request){

        $this->validate($request,[
            'teacher_name' => 'required',
            'institution_id' => 'required',
            'phone' => 'required|digits:11'
        ]);
        //如果修改了电话号码，则进行新手机号码的合法性进行验证
        if ($request->phone != $request->oldPhone) {
            $this->validate($request,[
                'phone' => 'unique:users'
            ]);
        }
        $data = [];
        $data['institution_name'] = $request->institution_name;
        $data['institution_id'] = $request->institution_id;
        $data['teacher_name'] = $request->teacher_name;
        $data['teacher_sex'] = $request->teacher_sex;
        $data['teacher_content'] = $request->teacher_content;
        $data['phone'] = $request->phone;
        $data['teacher_WeiXinOpenId'] = $request->teacher_WeiXinOpenId;
//        dump($data);
        $teacher->update($data);

        User::updateUser($request->teacher_name, $request->phone, $request->oldPhone);

        session()->flash('success', '教师信息更新成功！');
        return redirect()->route('teachers.show', $teacher);
    }
    public function destroy(Teacher $teacher){
        // $user_name = $user->name;
        //$this->authorize('destroy',$user);
        User::where('phone','=',$teacher->phone)->delete();
//        $teacher->delete();
        $teacher->teacher_status=Teacher::Dimission;
        session()->flash('success','成功删除班级：'.$teacher->teacher_name);
        return redirect()->route('teachers.index');
    }
}
