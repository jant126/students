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
        <a class="navbar-brand" href="{{route('home')}}" style="padding-top: 5px;"><img src="/images/RedBird.png" height="40px;" alt='RedBird'></a>
        <a class="navbar-brand" href="{{route('home')}}"> 红鸟软件</a>
      </div>
     @if( Auth::check() )
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            {{--机构管理菜单--}}
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                机构管理 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('schedules.create') }}">设置教学计划</a></li>
                <li><a href="{{ route('schedules.index') }}">查看教学安排</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('classrooms.create') }}">新增教室</a></li>
                <li><a href="{{ route('classrooms.index') }}">教室列表</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('institutions.create') }}">新增机构</a></li>
                <li><a href="{{ route('institutions.index') }}">机构列表</a></li>
              </ul>
            </li>

            {{--教师管理菜单--}}
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                教师管理 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                {{--<!--教师信息维护三级子菜单-->--}}
                {{--<li class="dropdown-submenu">--}}
                  {{--<a href="#">教师信息维护</a>--}}
                  {{--<ul class="dropdown-menu">--}}
                    <li><a href="{{ route('teachers.create') }}">新增教师</a></li>
                    <li><a href="{{ route('teachers.index') }}">教师列表</a></li>
                  {{--</ul>--}}
                </li>
              </ul>
            </li>

            {{--学员管理菜单--}}
            <li class="dropdown">
              <a  class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                学员管理 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <!--学员信息维护三级子菜单-->
                <li class="dropdown-submenu">
                  <a href="#">学员信息维护</a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('students.create') }}">新增学员</a></li>
                    <li><a href="{{ route('students.index') }}">学员列表</a></li>
                  </ul>
                </li>
                <li><a href="{{ route('students_courses_maintain') }}">学员课程维护</a></li>
              </ul>
            </li>

            {{--班级管理菜单--}}
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                班级管理 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <!--班级信息维护三级子菜单-->
                <li class="dropdown-submenu">
                  <a href="#">班级信息维护</a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('schoolclasses.create') }}">新增班级</a></li>
                    <li><a href="{{ route('schoolclasses.index') }}">班级列表</a></li>
                  </ul>
                </li>

                <li><a href="{{ route('class_course_setting') }}">班级课程设置</a></li>
                <li><a href="{{ route('classrooms_setting') }}">班级教室设置</a></li>
                <li><a href="{{ route('class_students_setting') }}">班级学员分配</a></li>
              </ul>
            </li>





            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                课程管理 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('courses.create') }}">新增课程</a></li>
                <li><a href="{{ route('courses.index') }}">课程列表</a></li>
                {{--<li><a href="{{ route('needLessons') }}">设置课程课时</a></li>--}}
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                个人账号 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="btn"> {{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('users.edit', Auth::user()->id) }}">修改个人资料</a></li>   
                <li><a href="{{ route('users.create') }}">增加用户</a></li> 
                <li><a href="{{ route('users.index') }}">所有用户</a></li>              
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