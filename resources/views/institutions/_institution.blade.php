<li>
  <a href="{{ route('institutions.show', $institution->id) }}" >
    机构名称： {{ $institution->institution_name }}  -
    法人：    {{ $institution->institution_legal_person }}
    创建时间：{{ $institution->created_at->diffForHumans() }}
  </a>
  <form action="{{ route('institutions.edit', $institution->id) }}" method="get">
    <button type="submit" class="btn btn-sm btn-info update-btn ">修改</button>
  </form>
  <form action="{{ route('institutions.destroy', $institution->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-sm btn-danger delete-btn ">删除</button>
  </form>
  <br>

<span class="content"><label for="content">机构简介：</label> {{ $institution->institution_content }}</span>
</li>