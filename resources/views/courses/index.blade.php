@extends('layouts.default')
@section('title', '所有课程')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <h1>所有课程</h1>
        <ul class="users">
            @foreach ($courses as $course)
                @include('courses._course_list')
            @endforeach
        </ul>
        {!! $courses->render() !!}
    </div>
@stop