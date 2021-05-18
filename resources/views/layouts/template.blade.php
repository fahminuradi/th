<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title')|Jajan-KU</title>

    <!-- Bootstrap -->
    <link href="{{ asset('gantelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('gantelella/vendors/font-awesome/css/font-awesome.min.css') }}"
        rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('gantelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('gantelella/vendors/iCheck/skins/flat/green.css') }}"
        rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link
        href="{{ asset('gantelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('gantelella/vendors/jqvmap/dist/jqvmap.min.css') }}"
        rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('gantelella/vendors/bootstrap-daterangepicker/daterangepicker.css') }}"
        rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('gantelella/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gantelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="{{ asset('gantelella/vendors/dropzone/dist/min/dropzone.min.css') }}"
        rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-gift"></i> <span>Jajan-KU</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            @include('layouts.menu')
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    @if(Auth::check())
                                        {{ Auth::user()->name }}
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                @yield('content')

            </div>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
               &copy; Fahmi Nuradi | Jajan-Ku
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('gantelella/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script
        src="{{ asset('gantelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <!-- FastClick -->
    <script src="{{ asset('gantelella/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('gantelella/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('gantelella/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('gantelella/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script
        src="{{ asset('gantelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <!-- iCheck -->
    <script src="{{ asset('gantelella/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('gantelella/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('gantelella/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('gantelella/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('gantelella/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('gantelella/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('gantelella/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script
        src="{{ asset('gantelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}">
    </script>
    <script src="{{ asset('gantelella/vendors/flot-spline/js/jquery.flot.spline.min.js') }}">
    </script>
    <script src="{{ asset('gantelella/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('gantelella/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('gantelella/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('gantelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}">
    </script>
    <script
        src="{{ asset('gantelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}">
    </script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('gantelella/vendors/moment/min/moment.min.js') }}"></script>
    <script
        src="{{ asset('gantelella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}">
    </script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('gantelella/build/js/custom.min.js') }}"></script>

    <script src="{{ asset('gantelella/vendors/dropzone/dist/min/dropzone.min.js') }}">
    </script>

    <!-- FastClick -->
    <script src="{{ asset('gantelella/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('gantelella/vendors/nprogress/nprogress.js') }}"></script>


</body>

</html>