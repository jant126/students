@foreach($lessons as $lesson)
<li>

            <a href="#" >
                第{{$lesson->lesson_index+1}}课 -
                上课日期： {{ $lesson->lesson_date }}  {{ $lesson->lesson_time }}
            </a>
<br>
            <a>
            课时名称： {{ $lesson->lesson_name }}  -
            课时时长：    {{ $lesson->how_long }} 分钟
            {{--创建时间：{{ $schoolclass->created_at }}--}}
            </a>



</li>
@endforeach