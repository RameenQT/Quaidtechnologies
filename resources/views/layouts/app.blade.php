<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Quaid Technologies | The Heartbeat of Next Generation Technology!</title>

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/admin_theme/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="/admin_theme/plugins/select2/select2.min.css">
	
	
    <link rel="stylesheet" href="/admin_theme/plugins/datepicker/datepicker3.css">
	
	
	 <link rel="stylesheet" href="/admin_theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    @yield('datatables_css')

    <!-- Theme style -->
    <link rel="stylesheet" href="/admin_theme/dist/css/AdminLTE.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/admin_theme/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('page_css')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.header')

    @include('partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	@include('flash::message')
    @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('partials.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/admin_theme/plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="/admin_theme/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="/admin_theme/plugins/select2/select2.full.min.js"></script>

@yield('datatables_js')

<!-- SlimScroll -->
<script src="/admin_theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/admin_theme/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/admin_theme/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin_theme/dist/js/demo.js"></script>

<script src="/admin_theme/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="/admin_theme/plugins/chartjs/Chart.min.js"></script>



@yield('page_js')

</body>
</html>
