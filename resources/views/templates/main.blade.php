<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap3/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/awesome_fonts/css/font_awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customs.css') }}">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('theme/bsAdmin/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/bsAdmin/dist/css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/bsAdmin/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/bsAdmin/bower_components/morrisjs/morris.css') }}" rel="stylesheet">


    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap3/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
    <script src="{{ asset('js/customs.js') }}"></script>


    <!-- Morris Charts CSS -->

    <!-- Custom Fonts -->
    <link href="{{ asset('theme/bsAdmin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
    <div id="wrapper">

        <!-- Navigation -->
        @include('templates.menu-2')                
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <div id="page-wrapper">
    <!-- <div class="container">      -->
        @yield('content')
    </div>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('theme/bsAdmin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('theme/bsAdmin/bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('theme/bsAdmin/bower_components/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('theme/bsAdmin/js/morris-data.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('theme/bsAdmin/dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
