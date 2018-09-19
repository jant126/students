@extends('layouts.default')
@section('title', '修改课程信息')

@include('shared._datetimepicker')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>修改课程信息</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form method="POST" action="{{ route('courses.update',$course->id) }}">
                    <div class="form-group">
                        <div class=" row">
                            <div class="col-md-6">
                                <label for="name">课程名称：</label>
                                <input type="text" name="course_name" class="form-control"
                                       value="{{ $course->course_name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="class_count">课程课时数：</label>
                                <input type="text" name="course_count" class="form-control"
                                       onkeyup="value = value.replace(/[^\d]/g,'')"
                                       placeholder="请输入数字"
                                       value="{{ $course->course_count }}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class=" row">
                            <div class="col-md-6">
                                <label for="class_content">课程简介：</label>
                                <input type="text" name="course_content" class="form-control"
                                       value="{{ $course->course_content }}">
                            </div>
                            <div class="col-md-6">
                                <label for="institution_name">课程所属机构：</label>            <br>
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