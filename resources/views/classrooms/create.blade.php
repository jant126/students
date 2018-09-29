@extends('layouts.default')
@section('title', '增加教室')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>增加教室</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form method="POST" action="{{ route('classrooms.store') }}">
                @include('classrooms._classroom')
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">添加</button>
            </form>
        </div>
            <div class="panel-footer" id="classrooms_list" >
                <script type="text/javascript">
                    $(document).ready(function () {
                        $.get("{{route('displayClassrooms')}}",function (result) {
                            $('#classrooms_list').html(result);
                        })
                    })
                </script>
            </div>
    </div>
    </div>
@stop