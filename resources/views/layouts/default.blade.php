<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="x-ua-compatible" content="ie=7">
    <title>@yield('title', '红鸟软件') </title>
    @section('css_section')
    <link rel="stylesheet" href='/css/app.css'>
    <link rel="stylesheet" href='/css/my_css.css'>
    @show

    @section('js_section')
    <script src="/js/app.js"></script>
    <script type="text/javascript" src="/js/jquery.js"></script>
    @show
  </head>
  <body >
    @include('layouts._header')
    <div class="container">
      <div class="col-md-offset-1 col-md-10">
        @include('shared._messages')

        @yield('content')
        @include('layouts._footer')  
      </div>
    </div>  

  </body>
</html>