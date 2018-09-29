@extends('layouts.default')
@section('title', '增加课程')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>增加课程</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form method="POST" action="{{ route('courses.store') }}">
                    @include('courses._course')
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">添加</button>
            </form>
        </div>
        <div class="panel-footer" id="courses_list" >
            <script type="text/javascript">
                $(document).ready(function () {
                    $.get("{{route('displayCourses')}}",function (result) {
                        $('#courses_list').html(result);
                    })
                })
            </script>
        </div>
    </div>
    </div>
@stop