@extends('layouts.default')
@section('title', '修改班级信息')

@include('shared._datetimepicker')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>修改班级信息</h1>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form method="POST" action="{{ route('schoolclasses.update',$schoolclass->id) }}">


                    <div class="form-group">
                        <div class=" row">
                            <div class="col-md-6">
                                <label for="name">班级名称：</label>
                                <input type="text" name="class_name" class="form-control"
                                       value="{{ $schoolclass->class_name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="class_count">班级人数：</label>
                                <input type="text" name="class_count" class="form-control"
                                       onkeyup="value = value.replace(/[^\d]/g,'')"
                                       placeholder="请输入数字"
                                       value="{{ $schoolclass->class_count }}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class=" row">
                            <div class="col-md-6">
                                <label for="class_content">班级简介：</label>
                                <input type="text" name="class_content" class="form-control"
                                       value="{{ $schoolclass->class_content }}">
                            </div>
                            <div class="col-md-6">
                                <label for="institution_name">班级所属机构：</label>            <br>
                                @include('shared._institution_list')

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=" row">
                            <div class="col-md-6">
                                <label for="class_start">开班日期：</label>
                                <input type="text" name="class_start" class="form-control"
                                       node-type='datepicker' value="{{ $schoolclass->class__start }}">
                            </div>
                            <div class="col-md-6">
                                <label for="class_end">结束日期：</label>
                                <input type="text" name="class_end" class="form-control"
                                       node-type='datepicker' value="{{ $schoolclass->class__end }}">
                            </div>
                        </div>
                    </div>
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
        </div>
    </div>
    </div>
@stop