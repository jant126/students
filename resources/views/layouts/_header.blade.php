<nav class="navbar navbar-default">
  <div class="container-fluid">
     <div class="col-md-offset-2 col-md-10">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" style="padding-top: 5px;"><img src="/images/RedBird.png" height="40px;" alt='RedBird'></a>
        <a class="navbar-brand" href="#"> 红鸟软件</a>
      </div>
     @if( Auth::check() )
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a  class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                学员管理 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('students_info_maintain') }}">学员信息维护</a></li>
                <li><a href="{{ route('students_courses_maintain') }}">学员课程维护</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                班级管理 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('classes_info_maintain') }}">班级信息维护</a></li>
                <li><a href="{{ route('class_course_setting') }}">班级课程设置</a></li>
                <li><a href="{{ route('classrooms_setting') }}">班级教室设置</a></li>
                <li><a href="{{ route('class_students_setting') }}">班级学员分配</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                教师管理 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">教师信息维护</a></li>
                <li><a href="#">教师课程设置</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                教室管理 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">新增教室</a></li>
                <li><a href="#">教室列表</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                课程管理 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">新增或更新课程</a></li>
                <li><a href="#">课程列表</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                个人账号 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="btn"> {{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('users.edit', Auth::user()->id) }}">修改个人资料</a></li>
                <li role="separator" class="divider"></li>
                <li>
                  <a id="logout"  href="#" >
                    <form action="{{ route('logout') }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-block " type="submit" name="button">退出</button>
                    </form>
                  </a>
                </li>
              </ul>
            </li>
          @endif
        </ul>
        
      </div><!-- /.navbar-collapse -->
    </div><!-- /.col-md-offset-2 -->
  </div><!-- /.container-fluid -->
</nav>