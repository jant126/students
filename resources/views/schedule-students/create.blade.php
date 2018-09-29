@extends('layouts.default')
@section('title', '学员课程设置')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <h3>学员设置</h3>
        <ul class="users">
            @foreach ($schedules as $schedule)
                @include('schedules._schedules_list')
            @endforeach
        </ul>
        {!! $schedules->render() !!}
    </div>
@stop