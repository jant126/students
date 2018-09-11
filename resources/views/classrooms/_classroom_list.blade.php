<li>
    <a href="{{ route('classrooms.show', $classroom->id) }}" >
        教室名称： {{ $classroom->classroom_name }}  -
        教室地址：    {{ $classroom->classroom_address }}
        创建时间：{{ $classroom->created_at->diffForHumans() }}
    </a>
    <form action="{{ route('classrooms.edit', $classroom->id) }}" method="get">
        <button type="submit" class="btn btn-sm btn-info update-btn ">修改</button>
    </form>
    <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger delete-btn ">删除</button>
    </form>
    <br>

    <span class="content"><label for="content">
     教室简介：</label> {{ $classroom->classroom_content }}
     <br>
      <label> 所属机构：</label> {{ $classroom->institution_name }}
    </span>
</li>