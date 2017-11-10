<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion de Stock</title>
         
 
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="csss/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="csss/bootstrap.theme.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.1.1.js"></script> 
        <script type="text/javascript" src="js/bootstrap.js"></script>     
    </head>
    <body  style="background-image: url('img/gestion.jpg') ; background-repeat: no-repeat;  background-size: 1370px 770px; background-color: #cccccc;">
          <div style="background-image: url('img/header.jpg');    background-repeat: repeat-x;  height:100px;"> </div>
           @include('inc.headerAcceuil') 
           
           @yield('container')   
           @include('footer.footer')
    </body>
</html>
