@extends('layouts.default')
@section('title', '教师信息')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>新增教师信息</h1>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <ul class="users">
                    @include('teachers._teacher_list')
                </ul>
                {{ csrf_field() }}
            </div>
        </div>
    </div>
@stop