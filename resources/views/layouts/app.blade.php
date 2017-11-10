<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/img/stock.jpg"> 
    <title>{{ config('app.name', 'Gestion Stock') }}</title>
    <!-- Styles --> 
    
    <link href="/css/bootstrap.css" rel="stylesheet">      
     <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="/csss/font-awesome.min.css" rel="stylesheet" /> 
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">    
   
  
</head>
<body> 
          @include('inc.headerAcceuil')        
          @yield('content') 
          @include('flashy::message')  
       
          @include('footer.footer')
    <!-- Scripts -->
     <script type="text/javascript" src="/js/jquery-3.1.1.js"></script>   
     <script type="text/javascript" src="/js/bootstrap.js"></script>  
     <script src="{{ asset('/js/scripts.js') }}"></script>
     <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
