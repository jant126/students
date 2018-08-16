@extends('layouts.default')
@section('title', '更新个人资料')

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

                    <div class="form-group">
                        <label for="institution_name">机构名称：</label>
                        <input type="text" name="institution_name" class="form-control" value="{{ $user->institution_name }}">
                    </div>

                    <div class="form-group">
                        <label for="institution_code">机构代码：</label>
                        <input type="text" name="institution_code" class="form-control" value="{{ $user->institution_code }}">
                    </div>

                    <div class="form-group">
                        <label for="institution_content">机构简介：</label>
                        <input type="text" name="institution_content" class="form-control" value="{{ $user->institution_content }}">
                    </div>

                    <div class="form-group">
                        <label for="institution_address">机构地址：</label>
                        <input type="text" name="institution_address" class="form-control" value="{{ $user->institution_address }}">
                    </div>

                    <div class="form-group">
                        <label for="institution_legal_person">机构法人：</label>
                        <input type="text" name="institution_legal_person" class="form-control" value="{{ $user->institution_legal_person }}">
                    </div>

                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
            </div>
        </div>
    </div>
@stop