@include('shared._datetimepicker')

<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="student_number">学生学号：</label>
            <input type="text" name="student_number" class="form-control"
                   value="{{ old('student_number') }}">
        </div>
        <div class="col-md-6">
            <label for="student_name">学生名称：(必须输入)</label>
            <input type="text" name="student_name" class="form-control"
                   value="{{ old('student_name') }}">
        </div>
    </div>
</div>


<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="student_age">学生年龄：</label>
            <input type="text" name="student_age" class="form-control"
                   onkeyup="value = value.replace(/[^\d]/g,'')"
                   value="{{ old('student_age') }}">
        </div>
        <div class="col-md-6">
            <label for="student_sex">学生性别：</label>
            <select type="text" name="student_sex" class="form-control">
                <option selected value="女">女</option>
                <option  value="男">男</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="institution_name">学生所属机构：</label>
            @include('shared._institution_list_default')

        </div>
        <div class="col-md-6">
            <label for="phone">学生手机号码：(必须输入)</label>
            <input type="text" name="phone" class="form-control"
                   onkeyup="value = value.replace(/[^\d]/g,'')"
                   placeholder="请输入手机号码"
                   value="{{ old('phone') }}">
        </div>
    </div>
</div>

<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="student_id">学生身份证号：</label>
            <input type="text" name="student_id" class="form-control"  >
        </div>
        <div class="col-md-6">
            <label for="student_join_date">学生入学日期：(必须输入)</label>
            <input type="text" name="student_join_date" class="form-control"
                   node-type='datepicker'  value="{{ old('student_join_date') }}">
        </div>
    </div>
</div>


<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="student_mother_name">学生母亲姓名：</label>
            <input type="text" name="student_mother_name" class="form-control"
            value="{{ old('student_mother_name') }}">
        </div>
        <div class="col-md-6">
            <label for="student_mother_phone">学生母亲手机号码：</label>
            <input type="text" name="student_mother_phone" class="form-control"
                      value="{{ old('student_mother_phone') }}">
        </div>
    </div>
</div>

<div class="form-group">
    <div class=" row">
        <div class="col-md-6">
            <label for="student_father_name">学生父亲亲姓名：</label>
            <input type="text" name="student_father_name" class="form-control"
                   value="{{ old('student_father_name') }}">
        </div>
        <div class="col-md-6">
            <label for="student_father_phone">学生父亲手机号码：</label>
            <input type="text" name="student_father_phone" class="form-control"
                   value="{{ old('student_father_phone') }}">
        </div>
    </div>
</div>



