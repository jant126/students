@extends('layouts.default')
@section('title', '机构信息')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>新增机构信息</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <ul class="users">
                    @include('institutions._institution')
                    <li>
                        <a href="#" >
                            机构代码： {{ $institution->institution_code }} <br>
                            机构地址：    {{ $institution->institution_address }}
                        </a>
                    </li>
                </ul>
            {{ csrf_field() }}

            </div>
    </div>
    </div>
@stop