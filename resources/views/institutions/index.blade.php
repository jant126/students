@extends('layouts.default')
@section('title', '所有机构')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <h1>所有机构</h1>
        <ul class="users">
            @foreach ($institutions as $institution)
                @include('institutions._institution')
            @endforeach
        </ul>
        {!! $institutions->render() !!}
    </div>
@stop