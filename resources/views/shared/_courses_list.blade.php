<select id = "courses_list" name="courses_list" title="请选择"
        class=" selectpicker show-tick form-control" data-live-search="true"
        onchange="$('#course_id').val( $('#courses_list option:selected').val());">
    @if(isset($courses))
        @foreach( $courses as $course)
            @if( isset($currentModel) &&  $currentModel->course_id == $course->course_id)
                <option value="{{ $course->id }}" selected="selected">
                    {{ $course->course_name }}</option>
            @else
                <option value="{{ $course->id }}" >
                    {{ $course->course_name }}</option>
            @endif
        @endforeach
    @endif
</select>
<input type="hidden" name="course_id" id="course_id"  value="">