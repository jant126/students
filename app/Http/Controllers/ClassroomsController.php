<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Institution;
use Auth;
class ClassroomsController extends Controller
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
           return view('classrooms.create',compact('institutions'));
    }
    public function show(Classroom $classroom){
        return view('classrooms.show',compact('classroom'));
    }
    public  function edit(Classroom $classroom){
        $institutions = Institution::where('user_id','=',Auth::user()->id)->get();
        $currentModel = $classroom;
        return view('classrooms.edit',compact('classroom','institutions','currentModel'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'classroom_name' => 'required',
            'classroom_address' => 'required',
            'institution_id' => 'required'
        ]);
        $classroom = Classroom::create([
            'institution_id' => $request->institution_id,
            'institution_name' => $request->institution_name,
            'classroom_name' => $request->classroom_name,
            'classroom_address' =>  $request->classroom_address,
            'classroom_content' => $request->classroom_content
        ]);
        // Auth::login($user);
        session()->flash('success','教室添加成功！ 教室信息如下：');
        return redirect()->route('classrooms.show',[$classroom]);

    }
    public function update(Classroom $classroom, Request $request){
        $this->validate($request,[
            'classroom_name' => 'required',
            'institution_id' => 'required'
        ]);

        $data = [];
        $data['institution_name'] = $request->institution_name;
        $data['institution_id'] = $request->institution_id;
        $data['classroom_content'] = $request->classroom_content;
        $data['classroom_address'] = $request->classroom_address;
        $data['classroom_name'] = $request->classroom_name;
        $classroom->update($data);
        session()->flash('success', '教室信息更新成功！');
        return redirect()->route('classrooms.show', $classroom);
    }

    public function index(){
        $classrooms = User::find(Auth::user()->id)->classrooms()->paginate(10);
        if ($classrooms->count() == 0) {
            session()->flash('info', '暂无教室信息！请先增加教室！');
            return redirect()->route('classrooms.create');
        }
        return view('classrooms.index',compact('classrooms'));
    }

    public function destroy(Classroom $classroom){
        // $user_name = $user->name;
        //$this->authorize('destroy',$user);
        $classroom->delete();
        session()->flash('success','成功删除教室：'.$classroom->classroom_name);
        return redirect()->route('classrooms.index');
    }
}
