@extends('layouts.default')
@section('title', '设置教学计划')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>设置教学计划</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form id="scheduleForm" method="POST" action="{{ route('schedules.store') }}">
                    @include('schedules._schedule')
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">添加</button>
                </form>
            </div>
        </div>
    </div>
@stop