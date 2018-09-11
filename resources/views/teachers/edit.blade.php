@extends('layouts.default')
@section('title', '修改教师信息')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>修改教师信息</h1>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form method="POST" action="{{ route('teachers.update',$teacher->id) }}">


                    <div class="form-group">
                        <div class=" row">
                            <div class="col-md-6">
                                <label for="name">教师名称：</label>
                                <input type="text" name="teacher_name" class="form-control"
                                       value="{{ $teacher->teacher_name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="teacher_count">教师性别：</label>
                                <select type="text" name="teacher_sex" class="form-control">
                                    <option @if( $teacher->teacher_sex == '女') selected @endif value="女">女</option>
                                    <option @if( $teacher->teacher_sex == '男') selected @endif value="男">男</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=" row">
                            <div class="col-md-6">
                                <label for="phone">教师手机号码：</label>
                                <input type="text" name="phone" class="form-control"
                                       onkeyup="value = value.replace(/[^\d]/g,'')"
                                       placeholder="请输入手机号码"
                                       value="{{ $teacher->phone }}">
                                <input type="hidden" value="{{ $teacher->phone }}" name="oldPhone">
                            </div>
                            <div class="col-md-6">
                                <label for="teacher_count">教师微信OpenID：</label>
                                <input type="text" name="teacher_WeiXinOpenId"
                                       value="{{ $teacher->teacher_WeiXinOpenId }}" class="form-control"  >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=" row">
                            <div class="col-md-6">
                                <label for="teacher_content">教师简介：</label>
                                <textarea type="text" name="teacher_content" class="form-control"
                                rows="3" >{{ $teacher->teacher_content }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="institution_name">教师所属机构：</label>            <br>
                                @include('shared._institution_list')

                            </div>
                        </div>
                    </div>

                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
        </div>
    </div>
    </div>
@stop