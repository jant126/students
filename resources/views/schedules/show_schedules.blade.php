<h3>现有教学计划如下：</h3>
<ul class="users">
    @foreach ($schedules as $schedule)
        @include('schedules._schedules_list')
    @endforeach
</ul>
{!! $schedules->render() !!}