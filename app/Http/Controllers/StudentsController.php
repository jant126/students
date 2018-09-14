<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Institution;
use App\Models\Student;
use Auth;
class StudentsController extends Controller
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
            return view('students.create',compact('institutions'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'student_name' => 'required',
            'institution_id' => 'required',
            'student_join_date' => 'required|date',
            'phone' => 'required|unique:users|digits:11'
        ]);
//        dump($request);
        $student = Student::create([
            'institution_id' => $request->institution_id,
            'institution_name' => $request->institution_name,
            'student_number'=> $request->student_number,
            'student_name' => $request->student_name,
            'student_age'=> $request->student_age,
            'student_sex' =>  $request->student_sex,
            'student_id' => $request->student_id,
            'phone' => $request->phone,
            'student_join_date' => $request->student_join_date,
            'student_mother_name' => $request->student_mother_name,
            'student_mother_phone' => $request->student_mother_phone,
            'student_father_name' => $request->student_father_name,
            'student_father_phone' => $request->student_father_phone
        ]);
    //用学生的手机号码、学生名 创建家长用户，用户类型有：教师用户、家长用户、管理员
        User::createUser($request->student_name,$request->phone,User::StudentUser,Auth::user()->id);
        // Auth::login($user);
        session()->flash('success','学生添加成功！学生信息如下：');
        return redirect()->route('students.show',[$student]);
    }
    public  function edit(Student $student){
        $institutions = Institution::where('user_id','=',Auth::user()->id)->get();
        $currentModel = $student;
        return view('students.edit',compact('student','institutions','currentModel'));
    }
    public function show(Student $student)
    {
//        dump($student);
        return view('students.show', compact('student'));
    }
    public function index(){
        $students = User::find(Auth::user()->id)->students()->paginate(10);
        if ($students->count() == 0) {
            session()->flash('info', '暂无学生信息,请先增加学生！');
            return redirect()->route('students.create');
        }
        return view('students.index',compact('students'));
    }
    public function update(Student $student, Request $request){
        $this->validate($request,[
            'student_name' => 'required',
            'institution_id' => 'required',
            'student_join_date' => 'required|date',
            'phone' => 'required|digits:11'
        ]);
        if ($request->phone != $request->oldPhone) {
            $this->validate($request,['phone' => 'unique:users']);
        }
        $data = [];
        $data['institution_name'] = $request->institution_name;
        $data['institution_id'] = $request->institution_id;
        $data['student_number'] = $request->student_number;
        $data['student_name'] = $request->student_name;
        $data['student_age'] = $request->student_age;
        $data['student_sex'] = $request->student_sex;
        $data['student_id'] = $request->student_id;
        $data['phone'] = $request->phone;
        $data['student_join_date'] = $request->student_join_date;
        $data['student_mother_name'] = $request->student_mother_name;
        $data['student_mother_phone'] = $request->student_mother_phone;
        $data['student_father_name'] = $request->student_father_name;
        $data['student_father_phone'] = $request->student_father_phone;
        $student->update($data);
        User::updateUser($request->student_name, $request->phone, $request->oldPhone);
        session()->flash('success', '学生信息更新成功！');
        return redirect()->route('students.show', $student);
    }
    public function destroy(Student $student){
        // $user_name = $user->name;
        //$this->authorize('destroy',$user);
        User::where('phone','=',$student->phone)->delete();
        $student->delete();
        session()->flash('success','成功删除学生：'.$student->student_name);
        return redirect()->route('students.index');
    }

    

    public function courses_maintain()
    {
        return view('students.courses_maintain');
    }
}
