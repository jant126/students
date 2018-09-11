

<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="name">教师名称：</label>
            <input type="text" name="teacher_name" class="form-control"
                   value="{{ old('teacher_name') }}">
        </div>
        <div class="col-md-6">
            <label for="class_count">教师性别：</label>
            <select type="text" name="teacher_sex" class="form-control">
                <option selected value="女">女</option>
                <option  value="男">男</option>
            </select>
        </div>
</div>

<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="name">教师手机号码：</label>
            <input type="text" name="phone" class="form-control"
                   onkeyup="value = value.replace(/[^\d]/g,'')"
                   placeholder="请输入手机号码"
                   value="{{ old('phone') }}">
        </div>
        <div class="col-md-6">
            <label for="class_count">教师微信OpenID：</label>
            <input type="text" name="teacher_WeiXinOpenId" class="form-control"  >
        </div>
    </div>
</div>


<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="class_content">教师简介：</label>
            <textarea type="text" name="teacher_content" class="form-control" rows="3"
            value="{{ old('teacher_content') }}">{{ old('teacher_content') }}</textarea>
        </div>
        <div class="col-md-6">
            <label for="institution_name">教师所属机构：</label>            <br>
            @include('shared._institution_list_default')

        </div>
    </div>
</div>

</div>

