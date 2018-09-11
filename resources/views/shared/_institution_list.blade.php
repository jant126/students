
<select id = "institution_list" name="institution_list" class="form-control"
        onchange="$('#institution_name').val( $.trim($('#institution_list option:selected').text()));
 $('#institution_id').val( $('#institution_list option:selected').val());">
    @foreach( $institutions as $institution)
         @if($currentModel->institution_name == $institution->institution_name)
            <option value="{{ $institution->id }}" selected="selected">
            {{ $institution->institution_name }}</option>
         @else
                        <option value="{{ $institution->id }}" >
                                {{ $institution->institution_name }}</option>
         @endif
    @endforeach
</select>
<input type="hidden" name="institution_name" id="institution_name"
       value="{{ $currentModel->institution_name }}">
<input type="hidden" name="institution_id" id="institution_id"
       value="{{ $currentModel->institution_id }}">
