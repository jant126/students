<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '红鸟软件')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/my_css.css">
  </head>
  <body>
    @include('layouts._header')

    <div class="container">
      <div class="col-md-offset-1 col-md-10">
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>
  </body>
</html>