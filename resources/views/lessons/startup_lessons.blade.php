@extends('layouts.default')
@section('title', '上课课程查询')

@section('content')
    @if(count( $schedule_lessons)>0)
    <table class="table table-bordered table-striped table-hover table-condensed ">
        <caption> <h3>今天上课课程列表如下：</h3></caption>
        <thead>
        <tr>
            <th>所属机构</th>
            <th>班级名称</th>
            <th>课程名称</th>
            <th>授课教师</th>
            <th>课时名称</th>
            <th>上课日期</th>
            <th>上课时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($schedule_lessons as $schedule_lesson)
            @include('lessons._schedule_lesson_table')
        @endforeach
        </tbody>
    </table>
    @else
        <h3>今天暂无课程</h3>
    @endif

@stop