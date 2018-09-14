<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstitutionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function create(){
        return view('institutions.create');
    }
    public function edit(Institution $institution){

      return view('institutions.edit',compact('institution'));
    }
    public function update(Institution $institution, Request $request){
        $this->validate($request,[
            'institution_name' => 'required|max:50',
            'institution_content' => 'required'
        ]);

        $data = [];
        $data['institution_name'] = $request->institution_name;
        $data['institution_code'] = $request->institution_code;
        $data['institution_content'] = $request->institution_content;
        $data['institution_address'] = $request->institution_address;
        $data['institution_legal_person'] = $request->institution_legal_person;
        $data['user_id'] = $request->user_id;
        $institution->update($data);
        session()->flash('success', '机构信息更新成功！');
        return redirect()->route('institutions.show', $institution);
    }
    public function store(Request $request){
        $this->validate($request, [
            'institution_name' => 'required|max:5',
            'institution_content' => 'required'
        ]);
        $institution = Institution::create([
            'user_id' => $request->user_id,
            'institution_name' => $request->institution_name,
            'institution_code' => $request->institution_code,
            'institution_content' =>  $request->institution_content,
            'institution_address' => $request->institution_address,
            'institution_legal_person' => $request->institution_legal_person
        ]);
        // Auth::login($user);
        session()->flash('success','机构添加成功！ 机构信息如下：');
        return redirect()->route('institutions.show',[$institution]);

    }
    public function show(Institution $institution){
        return view('institutions.show',compact('institution'));
    }

    public function index(){

       $institutions = Institution::where('user_id','=',Auth::user()->id)->paginate(10);
        if ($institutions->count() == 0) {
            session()->flash('info', '暂无机构信息，请先增加机构信息！');
            return redirect()->route('institutions.create');
        }
       return view('institutions.index',compact('institutions'));
    }
    public function destroy(Institution $institution){
        // $user_name = $user->name;
        //$this->authorize('destroy',$user);
        $institution->delete();
        session()->flash('success','成功删除机构：'.$institution->institution_name);
        return view('institutions.index');
    }
}
