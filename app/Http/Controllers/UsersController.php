<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
   //     $this->middleware('auth', [
  //          'except' => ['show','create', 'store', 'index']
  //      ]);

   //     $this->middleware('guest', [
   //         'only' => ['create']
   //     ]);

    }

    public function index(){
        $users = User::where('creator_id','=',Auth::user()->id)->paginate(10);
        return view('users.index', compact('users'));
    }
    ///
    /// 根据指定的user显示user的详细信息
    ///
    public function show(User $user){
    	return view('users.show', compact('user'));
    }
    ///
    /// 显示添加新用户的界面
    ///
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
            'role' => $request->role,
            'is_admin' => false
    	]);
       // Auth::login($user);
    	session()->flash('success','用户添加成功！ 用户信息如下：');

    	return redirect()->route('users.show',[$user]);
    }
    //显示编辑用户界面
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
        $data['role'] = $request->role;
        $user->update($data);
        session()->flash('success', '个人资料更新成功！');
        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user){
       // $user_name = $user->name;
        $this->authorize('destroy',$user);
        $user->delete();
        session()->flash('success','成功删除用户：'.$user->name);
        return back();
    }


}
