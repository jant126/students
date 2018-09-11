<li>
    <a href="{{ route('students.show', $student->id) }}" >
        学生名称： {{ $student->student_name }}  -
        学生性别：    {{ $student->student_sex }}  -
        学生年龄：    {{ $student->student_age }}
        {{--创建时间：{{ $schoolclass->created_at }}--}}
    </a>
    <form action="{{ route('students.edit', $student->id) }}" method="get">
        <button type="submit" class="btn btn-sm btn-info update-btn ">修改</button>
    </form>
    <form action="{{ route('students.destroy', $student->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger delete-btn ">删除</button>
    </form>
    <br>

    <span class="content">
        <label for="content">学生学号：</label> {{ $student->student_number }}  -
        <label for="content">学生身份证号码：</label> {{ $student->student_id }} - <br>
        <label for="content">学生手机号码：</label> {{ $student->phone }} -
        <label for="content">学生入学日期：</label> {{ $student->student_join_date }}  <br>
        <label for="content">学生母亲姓名：</label> {{ $student->student_mother_name }} -
        <label for="content">学生母亲手机号码：</label> {{ $student->student_mother_phone }} <br>
        <label for="content">学生父亲姓名：</label> {{ $student->student_father_name }} -
        <label for="content">学生父亲手机号码：</label> {{ $student->student_father_phone }} <br>
    </span>
</li>