<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--<link rel="stylesheet" href="{{ asset('css/libs.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">--}}
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">--}}
    {{--    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>--}}
    @yield('styles')
    <style>
        ul {
            list-style: none;
        }
    </style>
</head>

<body>

<!-- Navigation -->
<div class="container bg-da nger">
    {{--<div class="container bg-primary">--}}
    <nav class="navbar navbar-default navbar-fixed-top" style="padding-top: 30px;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-right" style="margin-right: 5px;">
            <!-- /.dropdown -->
            {{--<li class="dropdown">--}}
            {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
            {{--<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
            {{--</a>--}}

            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                {{--<ul class="dropdown-menu dropdown-user">--}}
                {{--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>--}}
                {{--</li>--}}
                {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
                {{--</li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
        @endif
        <!-- /.dropdown-user -->
        {{--</li>--}}
        <!-- /.dropdown -->
        </ul>
    </nav>
    {{--</div>--}}
</div>
<!-- {{--<ul class="nav navbar-nav navbar-right">--}}
{{--@if(auth()->guest())--}}
{{--@if(!Request::is('auth/login'))--}}
{{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
{{--@endif--}}
{{--@if(!Request::is('auth/register'))--}}
{{--<li><a href="{{ url('/auth/register') }}">Register</a></li>--}}
{{--@endif--}}
{{--@else--}}
{{--<li class="dropdown">--}}
{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>--}}
{{--<ul class="dropdown-menu" role="menu">--}}
{{--<li><a href="{{ url('/auth/logout') }}">Logout</a></li>--}}

{{--<li><a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a></li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--@endif--}}
{{--</ul>--}} -->
<div class="container-fluid bg-i nfo" style="padding-top:90px;">
    <div class="row">
        <div class="col-md-3" style="position: fixed;">
            <nav class="navbar navbar-default navbar-fixed-side navba r-left" role="navigation">

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse bg-da nger">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
													<button class="btn btn-default" type="submit">
														<i class="fa fa-search"></i>
													</button>
												</span>
                                </div>
                                <!-- /input-group -->
                            </li>

                            <li>
                                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="#" data-toggle="collapse" data-target="#demo"><i
                                            class="fa fa-wrench fa-fw"></i>Users<i class="fa fa-angle-left"
                                                                                   style="margin-left: 151px;"></i></a>
                                <ul id="demo" class="collapse">
                                    <li>
                                        <a href="{{ route('admin.users.index') }}"><p>All Users</p></a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.users.create') }}">Create User</a>
                                    </li>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#" data-toggle="collapse" data-target="#demo2"><i
                                            class="fa fa-wrench fa-fw"></i> Posts<i class="fa fa-angle-left"
                                                                                    style="margin-left: 148px;"></i></a>
                                <ul id="demo2" class="collapse">
                                    <li>
                                        <a href="{{ route('admin.posts.index') }}">All Posts</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.posts.create') }}">Create Post</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.comments.index') }}">All Comments</a>
                                    </li>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>


                            <li>
                                <a href="#" data-toggle="collapse" data-target="#demo1"><i
                                            class="fa fa-wrench fa-fw"></i>Categories<i class="fa fa-angle-left"
                                                                                        style="margin-left: 120px;"></i></a>
                                <ul id="demo1" class="collapse">
                                    <li>
                                        <a href="{{ route('admin.categories.index') }}">All Categories</a>
                                    </li>

                                    {{--<li>--}}
                                    {{--<a href="{{ route('admin.categories.create') }}">Create Category</a>--}}
                                    {{--</li>--}}

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>


                            <li>
                                <a href="#" data-toggle="collapse" data-target="#demo3"><i
                                            class="fa fa-wrench fa-fw"></i>Media<i class="fa fa-angle-left"
                                                                                   style="margin-left: 150px;"></i></a>
                                <ul id="demo3" class="collapse">
                                    <li>
                                        <a href="{{ route('admin.media.index') }}">All Media</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.media.create') }}">Upload Media</a>
                                    </li>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#" data-toggle="collapse" data-target="#demo4"><i
                                            class="fa fa-bar-chart-o fa-fw"></i> Charts<i class="fa fa-angle-left"
                                                                                          style="margin-left: 143px;"></i></a>
                                <ul id="demo4" class="collapse">
                                    <li>
                                        <a href="flot.html">Flot Charts</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Morris.js Charts</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                            </li>
                            <li>
                                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                            </li>
                            <li>
                                <a href="#" data-toggle="collapse" data-target="#demo5"><i
                                            class="fa fa-wrench fa-fw"></i> UI Elements<i class="fa fa-angle-left"
                                                                                          style="margin-left: 100px;"></i></a>
                                <ul id="demo5" class="collapse">
                                    <li>
                                        <a href="panels-wells.html">Panels and Wells</a>
                                    </li>
                                    <li>
                                        <a href="buttons.html">Buttons</a>
                                    </li>
                                    <li>
                                        <a href="notifications.html">Notifications</a>
                                    </li>
                                    <li>
                                        <a href="typography.html">Typography</a>
                                    </li>
                                    <li>
                                        <a href="icons.html"> Icons</a>
                                    </li>
                                    <li>
                                        <a href="grid.html">Grid</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#" data-toggle="collapse" data-target="#demo6"><i
                                            class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<i
                                            class="fa fa-angle-left" style="margin-left: 40px;"></i></a>
                                <ul id="demo6" class="collapse">
                                    <li>
                                        <a href="#">Second Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Second Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="collapse" data-target="#demo7">Third Level <i
                                                    class="fa fa-angle-left" style="margin-left:5px;"></i></a>
                                        <ul id="demo7" class="collapse">
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li class="active">
                                <a href="#" data-toggle="collapse" data-target="#demo8"><i
                                            class="fa fa-files-o fa-fw"></i> Sample Pages<i class="fa fa-angle-left"
                                                                                            style="margin-left: 85px;"></i></a>
                                <ul id="demo8" class="collapse">
                                    <li>
                                        <a class="active" href="blank.html">Blank Page</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Login Page</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <div class="navbar-default sidebar" style="margen-top:-20px;" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i>Profile</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('admin.posts.index') }}">All Posts</a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.posts.create') }}">Create Post</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>

                </div>

            </div>
        </div>
        <div class="col-md-9 col-md-offset-3 bg-dan ger">
            <br>
            <hr>
            @yield('content')
        </div>
    </div>
</div>



<!-- Page Content -->
<!-- <div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header"></h1>
						        </div>
        /.col-lg-12
    </div>
    /.row
</div>
/.container-fluid
</div> -->
<!-- /#page-wrapper -->

{{--</div>--}}
<!-- /#wrapper -->

<!-- jQuery -->
{{--<!-- <script src="{{asset('js/libs.js')}}"></script> -->--}}


{{--</div>--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('footer')
</body>
</html>