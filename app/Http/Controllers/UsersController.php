<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store']
        ]);
    }

    public function show(User $user){
    	return view('users.show', compact('user'));
    }

    public function create(){
    	return view('users.create');
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'name' => 'required|max:50',
    		'email' => 'required|email|unique:users|max:200',
    		'password' => 'required|confirmed|min:6',
            'phone' =>'required|unique:users|digits:11'
    		]);
    	$user = User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt( $request->password),
            'phone' => $request->phone,
            'institution_name' => $request->institution_name,
            'institution_code' => $request->institution_code,
            'institution_content' => $request->institution_content,
            'institution_address' => $request->institution_address,
            'institution_legal_person' =>$request->institution_legal_person
    	]);
        Auth::login($user);
    	session()->flash('success','欢迎您');

    	return redirect()->route('users.show',[$user]);
    }

    public function edit(User $user){
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request){
        $this->validate($request,[
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $this->authorize('update', $user);
        $data = [];
        $data['name'] = $request->name;
        if( $request->password){
            $data['password'] = bcrypt( $request->password);
        }
        $data['phone'] = $request->phone;
        $data['institution_name'] = $request->institution_name;
        $data['institution_code'] = $request->institution_code;
        $data['institution_content'] = $request->institution_content;
        $data['institution_address'] = $request->institution_address;
        $data['institution_legal_person'] = $request->institution_legal_person;
        $user->update($data);
        session()->flash('success', '个人资料更新成功！');
        return redirect()->route('users.show', $user->id);
    }
}
