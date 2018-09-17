

@for( $i = 0; $i < $course->course_count; $i++)
    <div class="row" style="border-bottom: 1px solid #DEB887; padding :5px; background-color: #F5F5DC; ">
        <div class="col-md-5 " >
            <div class="form-group ">
                <label class="col-sm-5 control-label" for="{{'lesson_name_'.$i}}">  第{{$i+1}}节课名称：</label>
                <div class="col-sm-7 col-md-pull-1">
                    <input class="form-control" type="text" name="{{'lesson_name_'.$i}}"
                           id="{{'lesson_name_'.$i}}"
                           value="{{ $course->course_name }}">
                </div>
            </div>
        </div>

        <div class="col-md-3 col-md-pull-1">
            <div class="form-group ">
                <label class="col-sm-7 control-label" for="{{'how_long_'.$i}}">课时（分钟):</label>
                <div class="col-sm-5 col-md-pull-1">
                    <input class="form-control" type="text" name="{{'how_long_'.$i}}"
                           id="{{'how_long_'.$i}}"  onkeyup="value = value.replace(/[^\d]/g,'')"
                           value="90">
                </div>
            </div>
        </div>

        <div class="col-md-4 col-md-pull-1">
            <div class="form-group ">
                <label class="col-sm-6 control-label " for="{{'lesson_date_'.$i}}" >上课日期时间：</label>
                <div class="col-sm-6 col-md-pull-1">
                    <input class="form-control" type="text"  name="{{'lesson_date_'.$i}}"
                           id="{{'lesson_date_'.$i}}" node-type='datepicker'
                           readonly="readonly" style="width: 200px;">
                </div>
            </div>
        </div>


    </div>
@endfor
