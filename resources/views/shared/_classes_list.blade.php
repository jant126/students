<select id = "classes_list" name="classes_list" title="请选择班级"
        class=" selectpicker show-tick form-control" data-live-search="true"
        onchange="$('#class_id').val( $('#classes_list option:selected').val());
                $('#class_name').val( $.trim($('#classes_list option:selected').text())); ">
@if(isset($schoolClasses))
    @foreach( $schoolClasses as $schoolClass)
        @if(isset($currentModel) &&   $currentModel->class_id == $schoolClass->id)
            <option value="{{ $schoolClass->id }}" selected="selected">
                {{ $schoolClass->class_name }}</option>
        @else
            <option value="{{ $schoolClass->id }}" >
                {{ $schoolClass->class_name }}</option>
        @endif
    @endforeach
@endif
</select>
@if(isset($currentModel))
    <input type="hidden" name="class_id" id="class_id"
           value="{{ $currentModel->class_id }}">
    <input type="hidden" name="class_name" id="class_name"
           value="{{ $currentModel->class_name }}">
@else
    <input type="hidden" name="class_id" id="class_id"
           value="{{ ($schoolClasses[0])->id }}">
    <input type="hidden" name="class_name" id="class_name"
           value="{{ ($schoolClasses[0])->class_name }}">
@endif