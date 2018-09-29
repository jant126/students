<select id = "courses_list" name="courses_list" title="请选择课程"
        class=" selectpicker show-tick form-control" data-live-search="true"
        onchange="$('#course_id').val( $('#courses_list option:selected').val());
                    $('#course_name').val( $.trim($('#courses_list option:selected').text()));">
    @if(isset($courses))
        @foreach( $courses as $course)
            @if( isset($currentModel) &&  $currentModel->course_id == $course->id)
                <option value="{{ $course->id }}" selected="selected">
                    {{ $course->course_name }}</option>
            @else
                <option value="{{ $course->id }}" >
                    {{ $course->course_name }}</option>
            @endif
        @endforeach
    @endif
</select>
@if(isset($currentModel))
    <input type="hidden" name="course_id" id="course_id"
           value="{{ $currentModel->course_id }}">
    <input type="hidden" name="course_name" id="course_name"
           value="{{ $currentModel->course_name }}">
@else
    <input type="hidden" name="course_id" id="course_id"
           value="{{ ($courses[0])->id }}">
    <input type="hidden" name="course_name" id="course_name"
           value="{{ ($courses[0])->course_name }}">
@endif