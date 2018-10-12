<table class="table table-bordered table-striped table-hover">
    <caption> <h3>{{ $lesson->course_name }}需要签到的学生名单如下：</h3>
    <br>课时名称：{{$lesson->lesson_name}} -上课时间: {{ $lesson->lesson_date.' '. $lesson->lesson_time }}
    </caption>
    <thead>
    <tr>
        <th>所属机构</th>
        <th>班级名称</th>
        <th>课程名称</th>
        <th>上课老师</th>
        <th>学生名称</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($student_schedules as $student_schedule)
        @include('student_schedules._students_table')
    @endforeach

    </tbody>
</table>
{{--{!! $student_schedules->render() !!}--}}