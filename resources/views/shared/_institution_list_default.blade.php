<select id = "institution_list" name="institution_list" class="form-control"
        onchange="$('#institution_name').val( $.trim($('#institution_list option:selected').text()));
 $('#institution_id').val( $('#institution_list option:selected').val());">
    @foreach( $institutions as $institution)
            <option value="{{ $institution->id }}" >
                {{ $institution->institution_name }}</option>
    @endforeach
</select>
<input type="hidden" name="institution_name" id="institution_name"
       value="{{ ($institutions[0])->institution_name }}">
<input type="hidden" name="institution_id" id="institution_id"
       value="{{ ($institutions[0])->id }}">