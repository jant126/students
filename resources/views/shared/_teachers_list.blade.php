<select id = "teachers_list" name="teachers_list" title="请选择上课老师" data-live-search="true"
        class=" selectpicker show-tick form-control"
        onchange="$('#teacher_id').val( $('#teachers_list option:selected').val());
            $('#teacher_name').val( $.trim($('#teachers_list option:selected').text()));">
    @if(isset($teachers))
        @foreach( $teachers as $teacher)
            @if(isset($currentModel) &&  $currentModel->teacher_id == $teacher->id)
                <option value="{{ $teacher->id }}" selected="selected">
                    {{ $teacher->teacher_name}}</option>
            @else
                <option value="{{ $teacher->id }}" >
                    {{ $teacher->teacher_name }}</option>
            @endif
        @endforeach
    @endif
</select>
@if(isset($currentModel))
    <input type="hidden" name="teacher_id" id="teacher_id"
           value="{{ $currentModel->teacher_id }}">
    <input type="hidden" name="teacher_name" id="teacher_name"
           value="{{ $currentModel->teacher_name }}">
@else
    <input type="hidden" name="teacher_id" id="teacher_id"
           value="{{ ($teachers[0])->id }}">
    <input type="hidden" name="teacher_name" id="teacher_name"
           value="{{ ($teachers[0])->teacher_name }}">
@endif