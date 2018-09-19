@extends('layouts.default')
@section('title', '增加教师')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>增加教师</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form method="POST" action="{{ route('teachers.store') }}">
                    @include('teachers._teacher')
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">添加</button>
            </form>
        </div>
    </div>
    </div>
@stop