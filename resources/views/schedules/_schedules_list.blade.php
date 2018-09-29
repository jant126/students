<li>
    <a href="{{ route('schedules.show', [$schedule->institution_id,$schedule->class_id,
                     $schedule->course_id,$schedule->teacher_id]) }}" >
        机构：{{ $schedule->institution_name }} -
        教室：{{ $schedule->classroom_name }}
    </a>
    <form action="{{ route('schedules.edit',
                    [$schedule->institution_id,$schedule->class_id,
                     $schedule->course_id,$schedule->teacher_id]) }}" method="get">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-sm btn-info update-btn ">修改</button>
    </form>
    <form action="{{ route('schedules.destroy', [$schedule->institution_id,$schedule->class_id,
                     $schedule->course_id,$schedule->teacher_id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger delete-btn ">删除</button>
    </form>
    <br>
    <a> 班级：{{ $schedule->class_name }}  -  </a>
    <span class="content"><label for="content">
    课程：</label> {{ $schedule->course_name }}
      <label> -教师：</label> {{ $schedule->teacher_name }}
    </span>
</li>