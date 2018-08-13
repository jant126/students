<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>@yield('title', 'RedBirdTech 红鸟软件科技')</title>
		  <!-- 禁止浏览器从本地机的缓存中调阅页面内容 -->
   		<meta http-equiv="Pragma" content="no-cache">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="/css/app.css">	
		<!--[if lt IE 9]>
       		<script src="https://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.js"></script>
    	<![endif]-->
	</head>

	<body>
		<nav class="navbar navbar-default">
		    <div class="container">
		        <div class="navbar navbar-header ">
		            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>	
		            <a href="" class="navbar-brand" style="padding-top: 5px;" ><img src="images/RedBird.png" height="40" ></a>
		        	<a class="navbar-brand" href="#">RedBirdTech</a>	            
		        </div>
		        
		        <div id="top-navbar" class="navbar-collapse collapse">
		            <ul class="nav navbar-nav">
		                <li class="active"><a href="#">Home</a></li>
		                <li><a href="#">About</a></li>
		                <li><a href="#">Contact</a></li>
		                <li class="dropdown">
		                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">Dropdown <span class="caret"></span></a>
		                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu"  role="menu">
		                        <li><a href="#">Action</a></li>
		                        <li><a href="#">Another action</a></li>
		                        <li><a href="#">Something else here</a></li>
		                        <li role="separator" class="divider"></li>
		                        <li class="dropdown-header">Nav header</li>
		                        <li><a href="#">Separated link</a></li>
		                        <li><a href="#">One more separated link</a></li>
		                    </ul>
		                </li>
		            </ul>
		            <ul class="nav navbar-nav navbar-right">
		                <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
		                <li><a href="../navbar-static-top/">Static top</a></li>
		                <li><a href="../navbar-fixed-top/">Fixed top</a></li>
		            </ul>
		        </div><!--/.nav-collapse -->
		    </div><!--/.container -->
		</nav>
	</body>

