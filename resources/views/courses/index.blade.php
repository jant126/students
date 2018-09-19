@extends('layouts.default')
@section('title', '所有课程')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <h3>所有课程</h3>
        <ul class="users">
            @foreach ($courses as $course)
                @include('courses._course_list')
            @endforeach
        </ul>
        {!! $courses->render() !!}
    </div>
@stop