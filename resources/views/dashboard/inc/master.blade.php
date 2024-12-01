<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>SJAK Doc Share</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
     <!-- {{asset('dash/')}} -->
    <!-- FontAwesome JS-->
    <script defer src="{{asset('dash/assets/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('dash/assets/css/portal.css')}}">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
	<link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>

</head> 

<body class="app">   	
    <header class="app-header fixed-top">	   	            
		@include('dashboard.inc.header')

        @include('dashboard.inc.sidebar')
    </header><!--//app-header-->
    
    <div class="app-wrapper">

        @yield('content')	        

        @include('dashboard.inc.footer')	    
	
    </div><!--//app-wrapper-->    					

    <!-- {{asset('dash/')}} -->
    <!-- Javascript -->          
    <script src="{{asset('dash/assets/plugins/popper.min.js')}}"></script>
    <script src="{{asset('dash/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>  

    <!-- Charts JS -->
    <script src="{{asset('dash/assets/plugins/chart.js/chart.min.js')}}"></script> 
    <script src="{{asset('dash/assets/js/index-charts.js')}}"></script> 
    <script src="{{asset('dash/assets/js/charts-demo.js')}}"></script> 

	<script src='https://code.jquery.com/jquery-3.3.1.js'></script>
	<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
	<script src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'></script>

        
    <!-- Page Specific JS -->
    <script src="{{asset('dash/assets/js/app.js')}}"></script> 
	<script src="{{asset('dash/dist/script.js')}}"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    

</body>
</html> 

