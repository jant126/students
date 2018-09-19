@extends('layouts.default')
@section('title', '所有教师')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <h3>所有教师</h3>
        <ul class="users">

            @foreach ($teachers as $teacher)
                @include('teachers._teacher_list')
            @endforeach
        </ul>
        {!! $teachers->render() !!}
    </div>
@stop