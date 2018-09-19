

<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="name">请选择机构：</label>
            @include('shared._institution_list')
        </div>
        <div class="col-md-6">
            <label for="class_count">教学计划：</label>
            <span id="schedule"></span>
        </div>
    </div>
</div>


<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="name">请选择班级：</label>
            @include('shared._classes_list')
        </div>
        <div class="col-md-6">
            <label for="class_count">请选择课程：</label>
            @include('shared._courses_list')
        </div>
    </div>

    <div class="form-group">
        <div class=" row">
            <div class="col-md-6">
                <label for="name">请选择上课教师：</label>
                @include('shared._teachers_list')
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
</div>
@include('shared._select_with_search')

<script type="text/javascript">
    $('#institution_list').change(function() {
        var path = "{{ url('schedules/schedule') }}/"+$('#institution_list').val();
        $('#scheduleForm').attr('action',path).submit();
    });
</script>


