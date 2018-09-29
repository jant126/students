@extends('layouts.default')
@section('title', '所有教学计划')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <h3>所有教学计划</h3>
        <ul class="users">
            @foreach ($schedules as $schedule)
               @include('schedules._schedules_list')
            @endforeach
        </ul>
        {!! $schedules->render() !!}
    </div>
@stop