
<select id = "institution_list" name="institution_list" class=" selectpicker show-tick form-control"
        onchange="$('#institution_name').val( $.trim($('#institution_list option:selected').text()));
 $('#institution_id').val( $('#institution_list option:selected').val());" data-live-search="true">
    @foreach( $institutions as $institution)
         @if(isset($currentModel) && $currentModel->institution_name == $institution->institution_name)
            <option value="{{ $institution->id }}" selected="selected">
            {{ $institution->institution_name }}</option>

         @else
                        <option value="{{ $institution->id }}" >
                                {{ $institution->institution_name }}</option>
         @endif
    @endforeach
</select>
@if(isset($currentModel))
    <input type="hidden" name="institution_name" id="institution_name"
          value="{{ $currentModel->institution_name }}">
    <input type="hidden" name="institution_id" id="institution_id"
          value="{{ $currentModel->institution_id }}">
@endif