<!DOCTYPE html>
<html lang="en-US">
<head>
   <title>ADMINISTRACIA - Ankiet</title>
 
   <!-- Load Bootstrap CSS -->
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <style>
      body {
          background-color: lightgoldenrodyellow;
      }

      .navbar{
         background-color:  lightpink;
      }
  </style>
</head>
<body>
   <!-- menu -->
   <nav class="navbar navbar-default">
      <div class="container-fluid">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle Navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ADMINISTRACIA</a>
         </div>
 
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
               <li><a href="{{ url('admin/') }}">Dashboard</a></li>
               <li><a href="{{ url('admin/voters') }}">Voliči</a></li>
               <li><a href="{{ url('admin/polls') }}">Ankety</a></li>
            </ul> 
         </div>
      </div>
   </nav>
   <!-- end menu -->
   <div class="container">
      <div class="content">
         @yield('content')
      </div>
   </div>
   <div class="footer">
      @yield('footer')
   </div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>   
</body>