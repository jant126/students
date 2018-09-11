@extends('layouts.default')
@section('title', '更新个人资料')

<!-- 以下是主页内容   !-->
@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>更新个人资料</h5>
            </div>
            <div class="panel-body">

                @include('shared._errors')


                <form method="POST" action="{{ route('users.update', $user->id )}}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">名称：</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">确认密码：</label>
                        <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">手机号码：</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                    </div>
                    @if ($user->role <> '管理员')
                    <div class="form-group">
                     <label>原角色类型:{{ $user->role }}</label>
                     <label for="role">新角色类型：</label>
                        <select id = "role_list" name="role_list" 
                        onchange="$('#role').val( $('#role_list option:selected').val() );">
                          <option value="教师用户" selected="selected">教师用户</option>
                          <option value="家长用户">家长用户</option>
                        </select>
                    </div>
                    @endif
                    <input type="hidden" name="role" id="role" value="{{ $user->role }}">
                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
            </div>
        </div>
    </div>
@stop