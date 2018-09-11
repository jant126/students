@extends('layouts.default')
@section('title', '所有学员')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <h1>所有学员</h1>
        <ul class="users">
            @foreach ($students as $student)
                @include('students._student_list')
            @endforeach
        </ul>
        {!! $students->render() !!}
    </div>
@stop