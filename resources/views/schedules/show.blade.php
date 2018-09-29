@extends('layouts.default')
@section('title', '教学计划信息')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                        <h3>教学计划信息 </h3>
                </div>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <ul class="users">
                    @include('schedules._schedules_list')
                </ul>
            </div>
        </div>
    </div>
@stop