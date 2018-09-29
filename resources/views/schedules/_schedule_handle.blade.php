<script type="text/javascript">

function initSelect(selecter,jsonObj,field){
    selecter.empty();
    for(var k in jsonObj)
    selecter.append("<option value='" +jsonObj[k].id+"'>"
        +jsonObj[k][field]+"</option>");
    selecter.selectpicker('refresh');
}
$(document).on('change','.selectpicker',function(){
    setSpan($('#selected_'+this.id.substr(0,this.id.lastIndexOf('_')-1)),$(this));
});
function setSpan(spantor,selector) {
    var txt= spantor.text().substr(0,spantor.text().lastIndexOf('：'));
    spantor.text(txt+'：'+selector.find("option:selected").text());
}
$(document).ready(function () {
    setSpan($("#selected_institution"),$('#institutions_list'));
    setSpan($("#selected_class"),$('#classes_list'));
    setSpan($("#selected_course"),$('#courses_list'));
    setSpan($("#selected_teacher"),$('#teachers_list'));
    setSpan($("#selected_classroom"),$('#classrooms_list'));
});

$('#institutions_list').change(function(){
    $.post("{{url('schedules/schedule')}}/"+$('#institutions_list').val(),     // 路由为Route::any('/key/klist/{project_id}')
        {'_token': '{{ csrf_token() }}'}, function(data,textStatus) {
        if(textStatus ==='success'){
        var obj = $.parseJSON(data);
        var teachers = obj.teachers;
        var schoolClasses = obj.schoolClasses;
        var courses = obj.courses;
        var classrooms = obj.classrooms;
        initSelect($('#teachers_list'),teachers,'teacher_name');
        initSelect($('#courses_list'),courses,'course_name');
        initSelect($('#classes_list'),schoolClasses,'class_name');
        initSelect($('#classrooms_list'),classrooms,'classroom_name');
        setSpan($("#selected_class"),$('#classes_list'));
        setSpan($("#selected_course"),$('#courses_list'));
        setSpan($("#selected_teacher"),$('#teachers_list'));
        setSpan($("#selected_classroom"),$('#classrooms_list'));
        $('#class_id').val($('#classes_list').find('option:selected').val());
        $('#class_name').val($('#classes_list').find('option:selected').text());
        $('#course_id').val($('#courses_list').find('option:selected').val());
        $('#course_name').val($('#courses_list').find('option:selected').text());
        $('#teacher_id').val($('#teachers_list').find('option:selected').val());
        $('#teacher_name').val($('#teachers_list').find('option:selected').text());
        $('#classroom_id').val($('#classrooms_list').find('option:selected').val());
        $('#classroom_name').val($('#classrooms_list').find('option:selected').text());
    }
    else{
        alert('获取数据失败！' + textStatus);
        window.location.href =" {{url('/')}}";
    }
    });
});
</script>