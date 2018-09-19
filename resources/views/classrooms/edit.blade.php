@extends('layouts.default')
@section('title', '修改教室信息')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>修改教室信息</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form method="POST" action="{{ route('classrooms.update',$classroom->id) }}">
                    <div class="form-group">
                        <label for="name">教室名称：</label>
                        <input type="text" name="classroom_name" class="form-control" value="{{ old('classroom_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="classroom_address">教室位置：</label>
                        <input type="text" name="classroom_address" class="form-control"
                               value="{{ old('classroom_address') }}">
                    </div>
                    <div class="form-group">
                        <label for="classroom_content">教室简介：</label>
                        <input type="text" name="classroom_content" class="form-control"
                               value="{{ old('classroom_content') }}">
                    </div>
                    <div class="form-group">
                        <label for="institution_name">教室所属机构：</label>
                        @include('shared._institution_list')
                    </div>
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
        </div>
    </div>
    </div>
@stop