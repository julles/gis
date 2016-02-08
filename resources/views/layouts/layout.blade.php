<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ Helper::bootstrap() }}favicon.ico">

    <title>{{ Helper::config('title') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ Helper::bootstrap() }}css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ Helper::bootstrap() }}css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" media="screen" type="text/css" href="{{ Helper::assetUrl() }}colorpicker/css/colorpicker.css" >

    <!--[if lt IE 9]><script src="{{ Helper::bootstrap() }}js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ Helper::bootstrap() }}js/ie-emulation-modes-warning.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    @include('layouts.navigation')
   
    <div class="container" style="padding-top:70px;">
     <ol class="breadcrumb">
     <?php $max = max(array_keys($breadCrumbs)); ?>
     @foreach($breadCrumbs as $index => $bread)
            
         <li class = '{{ (( $index==$max )) ? "active" : "" }}'>{{ $bread }}</li>
     
     @endforeach
      
    </ol>
    @yield('content')

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ Helper::bootstrap() }}js/vendor/jquery.min.js"><\/script>')</script>
    <script src="{{ Helper::bootstrap() }}js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ Helper::bootstrap() }}js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="{{ Helper::assetUrl() }}colorpicker/js/colorpicker.js"></script>

    @yield('script')
</html>
