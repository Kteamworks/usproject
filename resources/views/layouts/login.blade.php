<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>DRG POC</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link rel="shortcut icon" href="{{asset("img/ico/favicon.png")}}">
    
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    
    <link href="{{asset("css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset("css/style-responsive.css")}}" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<style type="text/css">
	.login-body{
    
    background: #26acc0;}
    .login-body .login-logo{
    	padding: 7px 0px;
    }
</style>

  </head>
  <body class="login-body">
         <div class="login-logo">
          <img src="{{asset('img/login_logo.png')}}" alt=""/ style="width: 19%;">
      </div>
	  @yield('content')
       @yield('body')
    <script src="{{asset("js/jquery-1.11.1.min.js")}}" type="text/javascript"></script>

    <script src="{{asset("js/bootstrap.min.js")}}" type="text/javascript"></script>

    <script src="{{asset("js/jrespond..min.js")}}" type="text/javascript"></script>

  </body>
</html>