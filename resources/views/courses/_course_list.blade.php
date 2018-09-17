<li>
    <a href="{{ route('courses.show', $course->id) }}" >
        课程名称： {{ $course->course_name }}  -
        课程课时数：    {{ $course->course_count }}
        {{--创建时间：{{ $schoolclass->created_at }}--}}
    </a>
    @if($course->has_lessons == false)
        <form action="{{ route('lessons.create', $course->id) }}" method="get">
            <button type="submit" class="btn btn-sm btn-info update-btn ">设置课时</button>
        </form>
    @else
        <form action="{{ route('lessons.show', $course->id) }}" method="get">
          <button type="submit" class="btn btn-sm btn-info update-btn ">显示课时</button>
        </form>
    @endif

    <form action="{{ route('courses.destroy', $course->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger delete-btn ">删除</button>
    </form>
    <br>

    <span class="content"><label for="content">
     课程简介：</label> {{ $course->course_content }}
     <br>
      <label> 所属机构：</label> {{ $course->institution_name }}
    </span>
</li>