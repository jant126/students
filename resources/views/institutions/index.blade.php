@extends('layouts.default')
@section('title', '所有机构')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <h3>所有机构</h3>
        <ul class="users">
            @foreach ($institutions as $institution)
                @include('institutions._institution')
            @endforeach
        </ul>
        {!! $institutions->render() !!}
    </div>
@stop