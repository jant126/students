@extends('layouts.default')
@section('title', '修改教学计划')

@section('content')
    <div  class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>修改教学计划</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form id="scheduleForm" method="POST" action="{{ route('schedules.update',
                [$currentModel->institution_id,$currentModel->class_id,
                     $currentModel->course_id,$currentModel->teacher_id]) }}">
                    @include('shared._select_with_search')
                    <div class="form-group">
                        <div class=" row">
                            <div class="col-md-6">
                                <label for="name">请选择机构：</label>
                                @include('shared._institution_list')
                            </div>
                            <div class="col-md-6">
                                <label for="class_count">目前教学计划：</label><br>
                                <span id="selected_institution">所选机构：</span><br>
                                <span id="selected_class">所选班级：</span><br>
                                <span id="selected_course">所选课程：</span><br>
                                <span id="selected_teacher">所选教师：</span><br>
                                <span id="selected_classroom">所选教室：</span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="original_institution_id" id="original_institution_id"
                           value="{{ $currentModel->institution_id }}">
                    <input type="hidden" name="original_class_id" id="original_class_id"
                           value="{{ $currentModel->class_id }}">
                    <input type="hidden" name="original_course_id" id="original_course_id"
                           value="{{ $currentModel->course_id }}">
                    <input type="hidden" name="original_teacher_id" id="original_teacher_id"
                           value="{{ $currentModel->teacher_id }}">
                    @include('schedules._schedule')
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">修改</button>
                </form>
            </div>
        </div>
    </div>
    @include('schedules._schedule_handle')

@stop