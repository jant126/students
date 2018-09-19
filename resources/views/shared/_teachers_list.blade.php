<select id = "teacher_list" name="teacher_list" title="请选择" data-live-search="true"
        class=" selectpicker show-tick form-control"
        onchange="$('#teacher_id').val( $('#teacher_list option:selected').val());">
    @if(isset($teachers))
        @foreach( $teachers as $teacher)
            @if(isset($currentModel) &&  $currentModel->teacher_id == $teacher->teacher_id)
                <option value="{{ $teacher->id }}" selected="selected">
                    {{ $teacher->teacher_name }}</option>
            @else
                <option value="{{ $teacher->id }}" >
                    {{ $teacher->teacher_name }}</option>
            @endif
        @endforeach
    @endif
</select>
<input type="hidden" name="teacher_id" id="teacher_id"  value="">