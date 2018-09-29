<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label for="name">教室名称：</label>
            <input type="text" name="classroom_name" class="form-control" value="{{ old('classroom_name') }}">
        </div>
        <div class="col-md-4">
            <label for="classroom_address">教室位置：</label>
            <input type="text" name="classroom_address" class="form-control"
                   value="{{ old('classroom_address') }}">
        </div>
        <div class="col-md-4">
            <label for="institution_name">教室所属机构：</label>
            @include('shared._institution_list_default')
        </div>
    </div>

</div>

<div class="form-group">
    <label for="classroom_content">教室简介：</label>
    <textarea rows="3"  name="classroom_content" class="form-control">{{ old('classroom_content') }}</textarea>
</div>

