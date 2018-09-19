@extends('layouts.default')
@section('title', '教室信息')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>新增教室信息</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <ul class="users">
                    @include('classrooms._classroom_list')
                </ul>
                {{ csrf_field() }}
            </div>
        </div>
    </div>
@stop