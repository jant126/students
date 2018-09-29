

<div id="scheduleBody">
    <div class="form-group">
        <div class=" row">
            <div class="col-md-6">
                <label for="name">请选择班级：</label>
                @include('shared._classes_list')
            </div>
            <div class="col-md-6">
                <label for="class_count">请选择课程：</label>
                @include('shared._courses_list')
            </div>
        </div>



        <div class="form-group">
            <div class=" row">
                <div class="col-md-6">
                    <label for="name">请选择上课教师：</label>
                    @include('shared._teachers_list')
                </div>
                <div class="col-md-6">
                        <label for="name">请选择上课教室：</label>
                        @include('shared._classroom_list')
                </div>
            </div>
        </div>
    </div>
</div>




