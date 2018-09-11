@include('shared._datetimepicker')

<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="name">班级名称：</label>
            <input type="text" name="class_name" class="form-control"
                   value="{{ old('class_name') }}">
        </div>
        <div class="col-md-6">
            <label for="class_count">班级人数：</label>
            <input type="text" name="class_count" class="form-control"
                   onkeyup="value = value.replace(/[^\d]/g,'')"
                   placeholder="请输入数字"
                   value="30">
        </div>
    </div>
</div>


<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="class_content">班级简介：</label>
            <input type="text" name="class_content" class="form-control"
                   value="{{ old('class_content') }}">
        </div>
        <div class="col-md-6">
            <label for="institution_name">班级所属机构：</label>            <br>
            @include('shared._institution_list_default')

        </div>
    </div>
</div>

<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="class_start">开班日期：</label>
            <input type="text" name="class_start" class="form-control" readonly="readonly"
                   node-type='datepicker' value="{{ old('class_start') }}">
        </div>
        <div class="col-md-6">
            <label for="class_end">结束日期：</label>
            <input type="text" name="class_end" class="form-control" readonly="readonly"
                   node-type='datepicker' value="{{ old('class_end') }}">
        </div>
    </div>
</div>

