
<select id = "schedules_list" name="schedules_list[]" multiple="true" data-live-search-placeholder="搜索"
        class=" selectpicker show-tick form-control"  data-none-Selected-Text="请选择"
        data-live-search="true">
    @if(isset($schedules))
        @foreach( $schedules as $schedule)
                <option value="{{$schedule->id.'_'.$schedule->institution_id
                .'_'.$schedule->institution_name
                .'_'.$schedule->class_id.'_'.$schedule->class_name.'_'.$schedule->course_id
                .'_'.$schedule->course_name.
                '_'.$schedule->teacher_id.'_'.$schedule->teacher_name
                 }}" >
   {{ $schedule->institution_name }}-{{ $schedule->class_name }}-{{ $schedule->course_name }}-{{ $schedule->teacher_name }}
</option>
@endforeach
@endif
</select>

