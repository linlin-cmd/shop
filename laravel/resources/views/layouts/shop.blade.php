<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>林林- @yield('title')</title>
    <link rel="shortcut icon" href="/laravel/index/images/favicon.ico" />
    
    <!-- Bootstrap -->
    <link href="/laravel/index/css/bootstrap.min.css" rel="stylesheet">
    <link href="/laravel/index/css/style.css" rel="stylesheet">
    <link href="/laravel/index/css/response.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond./laravel/index/js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="maincont">
        @yield('content')
     </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/laravel/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/laravel/index/js/bootstrap.min.js"></script>
    <script src="/laravel/index/js/style.js"></script>
    <!--焦点轮换-->
    <script src="/laravel/index/js/jquery.excoloSlider.js"></script>
    <script>
    $(function () {
     $("#sliderA").excoloSlider();
    });
  </script>
  </body>
</html>