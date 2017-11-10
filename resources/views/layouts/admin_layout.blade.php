<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>NTBIC</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="{{asset('')}}">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <link href="{{ URL::asset('assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ URL::asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />        
        <link href="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ URL::asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{  URL::asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ URL::asset('assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{URL::asset('assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="#">
                        <img src="{{ URL::asset('assets/layouts/layout/img/logo_ntbic.png') }}" width="86px" height="14px" alt="logo_ntbic" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold"></span> Thông báo
                                    </h3>
                                    <a href="">View all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                                   
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- PROFILE -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="" />
                                <span class="username username-hide-on-mobile uppercase"> Name</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>                                    
                                    <a href="{{url('user/1')}}">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="{{url('logout')}}">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler"> </div>
                        </li>
                        
                        <li class="nav-item" id="active-trang-chu">
                            <a href="{{url('admin')}}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Trang chủ</span>
                            </a>
                        </li>
                       <!--  Nội dung -->
                        <li class="heading">
                            <h3 class="uppercase">Nội dung </h3>
                        </li>                      
                        <li class="nav-item" id="active-user">
                            <a href="{{route('users.index')}}" class="nav-link nav-toggle">
                                <i class="icon-briefcase"></i>
                                <span class="title">Quản trị người dùng</span>
                            </a>
                        </li>
                        <li class="nav-item" id="active-role">
                            <a href="{{route('role.index')}}" class="nav-link nav-toggle">
                                <i class="icon-briefcase"></i>
                                <span class="title">Quản trị Roles</span>
                            </a>
                        </li>
                        <li class="nav-item" id="active-permission">
                            <a href="{{route('permission.index')}}" class="nav-link nav-toggle">
                                <i class="icon-briefcase"></i>
                                <span class="title">Quản trị Permissions</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="{{route('sso.login_form')}}">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>@yield('name_page')</li>
                        </ul>
                    </div>
                    <div class="content sm-gutter">
                        @yield('main')
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2017 &copy; Traning on job 2016 UET.
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
       
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{  URL::asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{  URL::asset('assets/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{  URL::asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{  URL::asset('assets/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{  URL::asset('assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/pages/scripts/profile.min.js') }}" type="text/javascript"></script>
        <script src="{{  URL::asset('assets/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
        @yield('js');
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>