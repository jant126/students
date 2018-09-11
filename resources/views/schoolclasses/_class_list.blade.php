<li>
    <a href="{{ route('schoolclasses.show', $schoolclass->id) }}" >
        班级名称： {{ $schoolclass->class_name }}  -
        班级人数：    {{ $schoolclass->class_count }}
        {{--创建时间：{{ $schoolclass->created_at }}--}}
    </a>
    <form action="{{ route('schoolclasses.edit', $schoolclass->id) }}" method="get">
        <button type="submit" class="btn btn-sm btn-info update-btn ">修改</button>
    </form>
    <form action="{{ route('schoolclasses.destroy', $schoolclass->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger delete-btn ">删除</button>
    </form>
    <br>

    <span class="content"><label for="content">
     班级简介：</label> {{ $schoolclass->class_content }}
     <br>
      <label> 开班时间：</label> {{ $schoolclass->class_start }}
        <br>
      <label> 结束时间：</label> {{ $schoolclass->class_end }}
        <br>
      <label> 所属机构：</label> {{ $schoolclass->institution_name }}
    </span>
</li>