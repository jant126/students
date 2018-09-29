
    <h3>现有教师</h3>
    <ul class="users">

        @foreach ($teachers as $teacher)
            @include('teachers._teacher_list')
        @endforeach
    </ul>
    {!! $teachers->render() !!}
