<select id = "classrooms_list" name="classrooms_list" title="请选择教室"
        class=" selectpicker show-tick form-control" data-live-search="true"
        onchange="$('#classroom_id').val( $('#classrooms_list option:selected').val());
                    $('#classroom_name').val( $.trim($('#classrooms_list option:selected').text()));">
    @if(isset($classrooms))
        @foreach( $classrooms as $classroom)
            @if( isset($currentModel) &&  $currentModel->classroom_id == $classroom->id)
                <option value="{{ $classroom->id }}" selected="selected">
                    {{ $classroom->classroom_name }}</option>
            @else
                <option value="{{ $classroom->id }}" >
                    {{ $classroom->classroom_name }}</option>
            @endif
        @endforeach
    @endif
</select>
@if(isset($currentModel))
    <input type="hidden" name="classroom_id" id="classroom_id"
           value="{{ $currentModel->classroom_id }}">
    <input type="hidden" name="classroom_name" id="classroom_name"
           value="{{ $currentModel->classroom_name }}">
@else
    <input type="hidden" name="classroom_id" id="classroom_id"
           value="{{ ($classrooms[0])->id }}">
    <input type="hidden" name="classroom_name" id="classroom_name"
           value="{{ ($classrooms[0])->classroom_name }}">
@endif