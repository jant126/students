<tr>
    <td>
        {{  $schedule->institution_name }}
    </td>
    <td>
        {{ $schedule->class_name }}
    </td>
    <td>
        {{ $schedule->course_name }}
    </td>
    <td>
        {{ $schedule->teacher_name }}
    </td>
    <td>
        {{ $schedule->classroom_name }}
    </td>
    <td>
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
    </td>
</tr>