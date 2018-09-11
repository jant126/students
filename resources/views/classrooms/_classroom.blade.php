<div class="form-group">
    <label for="name">教室名称：</label>
    <input type="text" name="classroom_name" class="form-control" value="{{ old('classroom_name') }}">
</div>
<div class="form-group">
    <label for="classroom_address">教室位置：</label>
    <input type="text" name="classroom_address" class="form-control"
           value="{{ old('classroom_address') }}">
</div>
<div class="form-group">
    <label for="classroom_content">教室简介：</label>
    <input type="text" name="classroom_content" class="form-control"
           value="{{ old('classroom_content') }}">
</div>
<div class="form-group">
    <label for="institution_name">教室所属机构：</label>
    @include('shared._institution_list_default')
</div>
