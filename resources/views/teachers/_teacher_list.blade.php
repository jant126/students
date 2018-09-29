<li>
    <a href="{{ route('teachers.show', $teacher->id) }}" >
        机构： {{ $teacher->institution_name }}  -
        教师名称： {{ $teacher->teacher_name }}  -
        教师性别：    {{ $teacher->teacher_sex }}
        {{--创建时间：{{ $schoolclass->created_at }}--}}
    </a>
    <form action="{{ route('teachers.edit', $teacher->id) }}" method="get">
        <button type="submit" class="btn btn-sm btn-info update-btn ">修改</button>
    </form>
    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger delete-btn ">删除</button>
    </form>
    <br>

    <span class="content"><label for="content">
     教师简介：</label> {{ $teacher->teacher_content }}
     <br>
      <label> 教师手机号码：</label> {{ $teacher->phone }}
        {{--<br>--}}
      {{--<label> 教师微信OpenID：</label> {{ $teacher->teacher_WeiXinOpenId }}--}}
    </span>
</li>