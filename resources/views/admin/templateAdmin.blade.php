<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel Admin Book </title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="/css/custom.css" rel="stylesheet">
    @yield("style")
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin Book Library</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{!! \Illuminate\Support\Facades\Auth::user()->first_name !!}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-edit"></i> Books <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/addBook">Add Book</a>
                                    </li>
                                    <li><a href="/admin/listBook">Delete Book</a>
                                    </li>
                                    <li><a href="/admin/BooksSold">Book Sold</a>
                                    </li>
                                    <li><a href="/admin/statistic">Statistic</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> Users <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/deleteUser">Delete User</a>
                                    </li>
                                    <li><a href="/admin/listUser">List of User</a>
                                    </li>
                                    <li><a href="icons.html">Statistics</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->


            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                               {!! \Illuminate\Support\Facades\Auth::user()->first_name !!}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">

                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                        <span class="image">
                                          <img src="/images/image_yassine.jpg" alt="Profile Image"/>
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                        <span class="image">
                                          <img src="/images/image_yassine.jpg" alt="Profile Image"/>
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                        <span class="image">
                                          <img src="/images/image_yassine.jpg" alt="Profile Image"/>
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                        <span class="image">
                                          <img src="/images/image_yassine.jpg" alt="Profile Image"/>
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a href="inbox.html">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        @yield("content")

                <!-- footer content -->
        <footer>
            <div class="pull-right">
                Online Library - Admin <a href="https://colorlib.com">ABBES YASSINE</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<!-- /gauge.js -->

<!-- jQuery -->
<script src="/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/vendors/nprogress/nprogress.js"></script>
<!-- morris.js -->
<script src="/vendors/raphael/raphael.min.js"></script>
<script src="/vendors/morris.js/morris.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="/js/custom.js"></script>

@yield("script")

</body>
</html>