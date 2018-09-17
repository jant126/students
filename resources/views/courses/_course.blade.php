
<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="name">课程名称：</label>
            <input type="text" name="course_name" class="form-control"
                   value="{{ old('course_name') }}">
        </div>
        <div class="col-md-6">
            <label for="course_count">课程课时数：</label>
            <input type="text" name="course_count" class="form-control"
                   onkeyup="value = value.replace(/[^\d]/g,'')"
                   placeholder="请输入数字"
                   value="34">
        </div>
    </div>
</div>


<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="course_content">课程简介：</label>
            <input type="text" name="course_content" class="form-control"
                   value="{{ old('course_content') }}">
        </div>
        <div class="col-md-6">
            <label for="institution_name">课程所属机构：</label>            <br>
            @include('shared._institution_list_default')

        </div>
    </div>
</div>



