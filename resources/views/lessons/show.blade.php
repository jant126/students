@extends('layouts.default')
@section('title', '课时信息')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>课时信息</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <ul class="users">
                    <li>
                        <form action="{{ route('lessons.edit', $course->id) }}" method="get">
                            <button type="submit" class="btn btn-sm btn-info update-btn ">修改课时设置</button>
                        </form>
                    </li>
                    @include('lessons._lessons_list')
                </ul>
                {{ csrf_field() }}
            </div>
        </div>
    </div>
@stop