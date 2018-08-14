<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '红鸟软件') </title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include('layouts._header')
    <div class="container">
      <div class="col-md-offset-1 col-md-10">
        @include('shared._messages')
        以下是内容区域：
        @yield('content')
        @include('layouts._footer')  
      </div>
    </div>  
    
  </body>
</html>