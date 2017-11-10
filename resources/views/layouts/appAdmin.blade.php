<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gestion Stock') }}</title>   

    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/icone-stock.png">

    <title>Gestion Stock Admin</title> 
    <link href="/css/bootstrap.css" rel="stylesheet">   
     
    <link href="/csss/bootstrap.min.css" rel="stylesheet">   
    <link href="/csss/bootstrap-theme.css" rel="stylesheet">   
    <link href="/csss/elegant-icons-style.css" rel="stylesheet" />
    <link href="/csss/font-awesome.min.css" rel="stylesheet" />      
    <link href="/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />   
    <link href="/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/csss/owl.carousel.css" type="text/css">
	<link href="/csss/jquery-jvectormap-1.2.2.css" rel="stylesheet">  
	<link rel="stylesheet" href="/csss/fullcalendar.css">
	<link href="/csss/widgets.css" rel="stylesheet">
    <link href="/csss/style.css" rel="stylesheet">
    <link href="/csss/style-responsive.css" rel="stylesheet" />
	<link href="/csss/xcharts.min.css" rel=" stylesheet">	
	<link href="/csss/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>    
</head>
<body>
    <div id="Container">
         
         @include('header.header')
         @include('flashy::message') 
         @include('sidebar.sidebar')              
         @yield('content')        
         @include('footer.footerAdmin')
       
    </div>
 <!-- javascripts -->
    <script <src="js/app.js/"></script>

    <script src="/jss/jquery.js"></script>
    <script src="/jss/jquery-ui-1.10.4.min.js"></script>
    <script src="/jss/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/jss/jquery-ui-1.9.2.custom.min.js"></script>
 
    <script src="/jss/bootstrap.min.js"></script>     
    <script src="/jss/jquery.nicescroll.js" type="text/javascript"></script>  
    <script src="/assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="/jss/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/jss/owl.carousel.js" ></script>
    <script src="/jss/fullcalendar.min.js"></script> 
    <script src="/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <script src="/jss/calendar-custom.js"></script>
    <script src="/jss/jquery.rateit.min.js"></script>    
    <script src="/jss/jquery.customSelect.min.js" ></script>
    <script src="/assets/chart-master/Chart.js"></script>
    <script src="/jss/scripts.js"></script>   
    <script src="/jss/sparkline-chart.js"></script>
    <script src="/jss/easy-pie-chart.js"></script>
    <script src="/jss/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/jss/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/jss/xcharts.min.js"></script>
    <script src="/jss/jquery.autosize.min.js"></script>
    <script src="/jss/jquery.placeholder.min.js"></script>
    <script src="/jss/gdp-data.js"></script>	
    <script src="/jss/morris.min.js"></script>
    <script src="/jss/sparklines.js"></script>	
    <script src="/js/charts.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/jss/jquery.slimscroll.min.js"></script>
    @stack('scripts')

</body>
</html>
