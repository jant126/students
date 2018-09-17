

@foreach( $lessons as $lesson)
    <div class="row" style="border-bottom: 1px solid #DEB887; padding :5px; background-color: #F5F5DC; ">
        <div class="col-md-5 " >
            <div class="form-group ">
                <label class="col-sm-5 control-label"
                       for="{{'lesson_name_'.$lesson->lesson_index}}">
                    第{{$lesson->lesson_index+1}}节课名称：</label>
                <div class="col-sm-7 col-md-pull-1">
                    <input class="form-control" type="text"
                           name="{{'lesson_name_'.$lesson->lesson_index}}"
                           id="{{'lesson_name_'.$lesson->lesson_index}}"
                           value="{{ $lesson->lesson_name }}">
                </div>
            </div>
        </div>

        <div class="col-md-3 col-md-pull-1">
            <div class="form-group ">
                <label class="col-sm-7 control-label"
                       for="{{'how_long_'.$lesson->lesson_index}}">
                    课时（分钟):</label>
                <div class="col-sm-5 col-md-pull-1">
                    <input class="form-control" type="text"
                           name="{{'how_long_'.$lesson->lesson_index}}"
                           id="{{'how_long_'.$lesson->lesson_index}}"
                           onkeyup="value = value.replace(/[^\d]/g,'')"
                           value="{{$lesson->how_long}}">
                </div>
            </div>
        </div>

        <div class="col-md-4 col-md-pull-1">
            <div class="form-group ">
                <label class="col-sm-6 control-label "
                       for="{{'lesson_date_'.$lesson->lesson_index}}" >
                    上课日期时间：</label>
                <div class="col-sm-6 col-md-pull-1">
                    <input class="form-control" type="text"
                           name="{{'lesson_date_'.$lesson->lesson_index}}"
                           id="{{'lesson_date_'.$lesson->lesson_index}}"
                           node-type='datepicker'
                           readonly="readonly" style="width: 200px;"
                           value="{{$lesson->lesson_date.' '.$lesson->lesson_time }}"
                    >
                </div>
            </div>
        </div>


    </div>
@endforeach
