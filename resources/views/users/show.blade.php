	@extends('layouts.default')
	@section('title', $user->name)
    @section('content')
     <p>用户名： {{ $user->name }} - 邮箱： {{ $user->email }}</p>
    @stop
