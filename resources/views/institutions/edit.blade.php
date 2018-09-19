@extends('layouts.default')
@section('title', '修改机构信息')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>修改机构信息</h3>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form method="POST" action="{{ route('institutions.update',$institution->id) }}">
                    <div class="form-group">
                        <label for="name">机构名称：</label>
                        <input type="text" name="institution_name" class="form-control"
                               value="{{ $institution->institution_name }}">
                    </div>

                    <div class="form-group">
                        <label for="institution_code">机构代码：</label>
                        <input type="text" name="institution_code" class="form-control"
                               value="{{ $institution->institution_code }}">
                    </div>

                    <div class="form-group">
                        <label for="institution_content">机构简介：</label>
                        <textarea name="institution_content" class="form-control"
                         rows="3" >{{ $institution->institution_content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="institution_address">机构地址：</label>
                        <input type="text" name="institution_address" class="form-control"
                               value="{{ $institution->institution_address }}">
                    </div>
                    <div class="form-group">
                        <label for="institution_legal_person">机构法人：</label>
                        <input type="text" name="institution_legal_person" class="form-control"
                               value="{{ $institution->institution_legal_person }}">
                    </div>

                    <input type="hidden" name="user_id" id="user_id" value="{{ $institution->user_id }}">
            </div>
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">修改</button>
            </form>
        </div>
    </div>
    </div>
@stop