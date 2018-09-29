



        <h3>现有教室如下：</h3>
        <ul class="users">
            @foreach ($classrooms as $classroom)
                @include('classrooms._classroom_list')
            @endforeach
        </ul>
        {!! $classrooms->render() !!}

