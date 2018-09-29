<h3>现有课程</h3>
<ul class="users">
    @foreach ($courses as $course)
        @include('courses._course_list')
    @endforeach
</ul>
{!! $courses->render() !!}