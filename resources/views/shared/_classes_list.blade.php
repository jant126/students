<select id = "classes_list" name="classes_list" title="请选择"
        class=" selectpicker show-tick form-control" data-live-search="true"
        onchange="$('#class_id').val( $('#classes_list option:selected').val());">
@if(isset($schoolClasses))
    @foreach( $schoolClasses as $schoolClass)
        @if(isset($currentModel) &&   $currentModel->class_id == $schoolClass->teacher_id)
            <option value="{{ $schoolClass->id }}" selected="selected">
                {{ $schoolClass->class_name }}</option>
        @else
            <option value="{{ $schoolClass->id }}" >
                {{ $schoolClass->class_name }}</option>
        @endif
    @endforeach
@endif
</select>
<input type="hidden" name="class_id" id="class_id"  value="">