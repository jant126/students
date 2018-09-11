@extends('layouts.default')
@section('title', '所有机构')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <h1>所有教室</h1>
        <ul class="users">
            @foreach ($schoolclasses as $schoolclass)
                @include('schoolclasses._class_list')
            @endforeach
        </ul>
        {!! $schoolclasses->render() !!}
    </div>
@stop