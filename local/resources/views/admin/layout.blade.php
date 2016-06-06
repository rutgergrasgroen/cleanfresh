<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clean&Fresh</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('/local/public/assets/css/admin.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body >

    <div id="wrapper">

        @if(!Auth::guest())

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/admin') }}"><i class="fa fa-cloud"></i> Clean&Fresh</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ url('/admin/Account') }}"><i class="fa fa-user fa-fw"></i> Mijn account</a>
                            </li>
                            <li><a href="{{ url('/admin/Settings') }}"><i class="fa fa-gear fa-fw"></i> Instellingen</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/admin/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="{{ url('/admin') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/Pages') }}"><i class="fa fa-edit fa-fw"></i> Pagina's</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/Forms') }}"><i class="fa fa-edit fa-fw"></i> Formulieren</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

        @endif

        @if(!Auth::guest()) 
            <div id="page-wrapper">
        @endif

            @if (session('alert'))
                <div class="row">

                    <div class="col-lg-12">

                        <div class="alert alert-{{ session('alert')['class'] }} alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            {{ session('alert')['html'] }}
                        </div>

                    </div>

                </div>
            @endif

            @yield('content')   

        @if(!Auth::guest()) 
            </div>
        @endif

    </div>

    <!-- JavaScripts -->
    <meta name="_token" content="{!! csrf_token() !!}" />
    <meta name="_siteurl" content="{!! url('/') !!}" />
    <script src="{{ asset('/local/public/assets/js/admin.js') }}"></script>
</body>
</html>
