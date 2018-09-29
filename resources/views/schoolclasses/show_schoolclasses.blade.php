<h3>现有班级</h3>
<ul class="users">
    @foreach ($schoolclasses as $schoolclass)
        @include('schoolclasses._class_list')
    @endforeach
</ul>
{!! $schoolclasses->render() !!}