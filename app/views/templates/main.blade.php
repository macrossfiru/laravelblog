<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{bit:griefer}.blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <script type="text/javascript" src="{{ URL::to('js/jquery.js') }}"></script>
    <link href="{{ URL::to('css/bootstrap.css') }}" rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.js') }}"></script>
    <link href="{{ URL::to('css/navbar.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ URL::to('css/style.css') }}" rel='stylesheet' type='text/css'>
    
    <!-- Import jcubic-jquery.terminal -->
    <link href="{{ URL::to('css/jquery.terminal.css') }}" rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="{{ URL::to('js/jquery.terminal-0.8.7.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/jquery.mousewheel-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/quaketerm.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/jsterminal-cmdlets.js') }}"></script>
   
  </head>
  
  <body>
    <div id="header_bg">
      <div id="terminal_bg"></div>
    </div>
    
    <div class="navbar navbar-custom" id="bg_navbar">
      <div class="navbar-inner">
        <div class="divider-vertical"></div>
          <a class="navbar-brand" href="#">{Bit:Griefer}</a>
        <div class="divider-vertical"></div>
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row-fluid" id="bg_blogrow">
        <div class="col-md-3" id="bg_sidebar">
          <div class="list-group">
            <p class="list-group-item" id="bg_list-group-header">BITGRIEFER MENU</p>
            <a href="#" class="list-group-item active">Home</a>
            <a href="#" class="list-group-item">Explode</a>
          </div>
        </div> 
        
        <div class="col-md-9 container" id="bg_blogpane">
          @yield('content')
          <!-- blog content -->
        </div>
        @yield('pagination')
      </div>
    </div>
    
    <!-- more script imports? -->
  </body>
</html>
      
