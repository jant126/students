@extends('layouts.default')
@section('title', '修改课程课时')
@include('shared._datetimepicker')
@section('content')
    <div class=" col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <div class="row ">
                    <div class="col-md-6">
                        <h4>修改课程: {{ $course->course_name }} -
                            共需安排：{{ $course->course_count }}节课
                        </h4>
                    </div>
                    <a class="btn btn-primary " onclick="submitLesson()">提交</a>
                </div>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form class="form-horizontal"  >

                    <div class="form-group">
                        <label for="update_lesson_name"
                               class="col-sm-3 col-md-pull-1 control-label input-label-text ">
                            一次性全改课时名称:</label>
                        <div class="col-sm-3 col-md-pull-1">
                            <input type="text" class="form-control "
                                   id="update_lesson_name" placeholder="请输入课时名字"
                                   onblur="updateAllValue('lesson_name_',this.value)">
                        </div>
                        <label for="update_time"
                               class="col-sm-3 control-label col-md-pull-2 input-label-text">
                            一次性全改上课时间:</label>
                        <div class="col-sm-3 col-md-pull-2">
                            <input type="text" class="form-control" node-type='datepicker'
                                   id="update_time" placeholder="请输入上课时间" readonly="readonly"
                                   onchange="updateTime('lesson_date_',this.value)">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="update_how_long"
                               class="col-sm-3 col-md-pull-1 control-label input-label-text ">
                            一次性全改课时时长:</label>
                        <div class="col-sm-3 col-md-pull-1">
                            <input type="text" class="form-control "
                                   id="update_how_long" placeholder="请输入课时时长"
                                   onkeyup="value = value.replace(/[^\d]/g,'')"
                                   onblur="updateAllValue('how_long_',this.value)">
                        </div>
                    </div>
                </form>

                <form class="form-horizontal" method="POST" id="lesson_form"
                      action="{{ route('lessons.update', $course->id) }}">
                    <input type="hidden" value="{{ $course->course_count }}"
                           name="course_count" id="course_count">
                    <input type="hidden" value="{{ $course->course_name }}"
                           name="course_name" id="course_name">
                    <input type="hidden" value="{{ $course->id }}"
                           name="course_id" id="course_id">
                    @include('lessons._edit_lesson')
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    {{--<div class='form-group text-center'>--}}
                    {{--<button  type="submit" class="btn-lg btn-primary  ">添加</button>--}}
                    {{--</div>--}}

                </form>
            </div>
        </div>
    </div>
@stop
<script type="text/javascript">

    function  updateAllValue( id,newValue) {
        var courseCount =parseInt( $('#course_count').val());
        for( var i = 0; i < courseCount; i++){
            $('#'+id+i).val(newValue);
        }
    }
    function updateTime(id, newTime) {
        if (newTime.length < 10)
            return;
        var courseCount =parseInt( $('#course_count').val());
        for( var i = 0; i < courseCount; i++){
            var oldDateTime = $('#'+id+i).val();
            if (oldDateTime.length > 10){
                var newDateTime = oldDateTime.substr(0,11)+newTime.substr(11,8);
                $('#'+id+i).val(newDateTime);
            }
        }
        $('#update_time').val(newTime.substr(11,8));
    }

    function submitLesson() {


        if (checkInput('#lesson_date_', '上课日期时间不能为空！') == false)
            return false;
        if (checkInput('#how_long_', '课时时长不能为空！') == false)
            return false;
        if (checkInput('#lesson_name_', '课时名称不能为空！') == false)
            return false;
        $('#lesson_form').submit();

    }
    function checkInput(id,errorMsg) {
        var count = parseInt($('#course_count').val());

        for (var i = 0;i< count;i++){

            var $parent = $(id+i).parent();
            $parent.find(".msg").remove(); //删除以前的提醒元素（find()：查找匹配元素集中元素的所有匹配元素）
            if ($(id+i).val() == ""){
                $parent.append("<span class='msg onError'>" + errorMsg + "</span>");
                alert(errorMsg);
                $(id+i).focus();
                return false;
            }
        }
        return true;
    }
</script>