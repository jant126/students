@extends('layouts.default')
@section('title', '设置教学计划')

@section('content')
    <div  class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>设置教学计划</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form id="scheduleForm" method="POST" action="{{ route('schedules.store') }}">
                        @include('shared._select_with_search')
                        <div class="form-group">
                            <div class=" row">
                                <div class="col-md-6">
                                    <label for="name">请选择机构：</label>
                                    @include('shared._institution_list')
                                </div>
                                <div class="col-md-6">
                                    <label for="class_count">拟定教学计划：</label><br>
                                    <span id="selected_institution">所选机构：</span><br>
                                    <span id="selected_class">所选班级：</span><br>
                                    <span id="selected_course">所选课程：</span><br>
                                    <span id="selected_teacher">所选教师：</span><br>
                                    <span id="selected_classroom">所选教室：</span>
                                </div>
                            </div>
                        </div>
                        @include('schedules._schedule')
                        {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">添加</button>
                </form>
            </div>
            <div class="panel-footer" id="schedules_list" >
                <script type="text/javascript">
                    $(document).ready(function () {
                        $.get("{{route('displaySchedules')}}",function (result) {
                            $('#schedules_list').html(result);
                        })
                    })
                </script>
            </div>
        </div>
    </div>
    @include('schedules._schedule_handle')
@stop
