@extends('layouts.default')
@section('title', '设置课程课时')
@include('shared._datetimepicker')
@section('content')
    <div class=" col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>设置课程: {{ $course->course_name }} - 每节课的时间安排</h4>
            </div>
            <div class="panel-body">
                @include('shared._errors')
                <form class="form-horizontal" method="POST"
                      action="{{ route('lessons.store') }}">
                    <input type="hidden" value="{{ $course->course_count }}" id="course_count">
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
                                   id="update_time" placeholder="请输入上课时间"
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
                        <div class="col-sm-3 col-md-pull-1">
                            <button style="height: fit-content" class="btn btn-primary "
                                    data-toggle="modal" data-target="#myModal">打开日历选择日期</button>
                        </div>

                        <!-- 模态框（Modal） -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">根据万历年选择上课日期</h4>
                                    </div>
                                    <div class="modal-body">
                                        @include('shared._permannent_calender')
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal -->
                        </div>
                    </div>





                    @include('lessons._lesson')
            {{ csrf_field() }}
                    <div class="row">
                        <button  type="submit" class="btn btn-primary">添加</button>
                    </div>

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
         var courseCount =parseInt( $('#course_count').val());
         for( var i = 0; i < courseCount; i++){
             var oldDateTime = $('#'+id+i).val();
             if (oldDateTime.length > 10){
                 var newDateTime = oldDateTime.substr(0,11)+newTime.substr(11,8);
                 $('#'+id+i).val(newDateTime);
             }

         }
     }
 </script>