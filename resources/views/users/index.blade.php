@extends('layouts.default')
@section('title', '所有用户')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <h1>所有用户</h1>
        <ul class="users">
            @foreach ($users as $user)
                <li>
                    <a href="{{ route('users.show', $user->id) }}" >
                       用户名： {{ $user->name }}  - 邮箱： {{ $user->email }}</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-sm btn-danger delete-btn ">删除</button>
                        </form>
                </li>
            @endforeach
        </ul>
        {!! $users->render() !!}
    </div>
@stop