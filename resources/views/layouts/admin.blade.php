<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('styles')
    <style>
    .fa-angle-left {
        float: right;
    }
    ul {
        list-style: none;
    }
    .dropzone {
      margin-top: 40px;
      min-height: 150px;
      border: 6px dashed rgba(0, 0, 0, 0.3);
      border-radius: 10px;
      background: white;
      padding: 50px 50px; 
  }
</style>
</head>

<body>

    <!-- Navigation -->
    <div class="container-fluid bg-da nger">
        {{--<div class="container bg-primary">--}}
            <nav class="navbar navbar-default" style="padding-top: 30px;">
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

                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
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

<div class="container-fluid bg-in fo" style="margin-top: -15px;">
    <div class="row">
        <div class="col-md-3 co-sm-3 col-xs-6 col-lg-3">
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
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="#" data-toggle="collapse" data-target="#demo"><i
                            class="fa fa-wrench fa-fw"></i>Users<i class="fa fa-angle-left"
                            ></i></a>
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
                                ></i></a>
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
                                    class="fa fa-wrench fa-fw"></i>Categories<i class="fa fa-angle-left">                                     </i></a>
                                    <ul id="demo1" class="collapse">
                                        <li>
                                            <a href="{{ route('admin.categories.index') }}">All Categories</a>
                                        </li>                                        
                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>


                                <li>
                                    <a href="#" data-toggle="collapse" data-target="#demo3"><i
                                        class="fa fa-wrench fa-fw"></i>Media<i class="fa fa-angle-left"
                                        ></i></a>
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
                                            ></i></a>
                                            <ul id="demo4" class="collapse">
                                                <li>
                                                    <a href="#">Flot Charts</a>
                                                </li>
                                                <li>
                                                    <a href="#">Morris.js Charts</a>
                                                </li>
                                            </ul>
                                            <!-- /.nav-second-level -->
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-table fa-fw"></i> Tables</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-edit fa-fw"></i> Forms</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="collapse" data-target="#demo5"><i
                                                class="fa fa-wrench fa-fw"></i> UI Elements<i class="fa fa-angle-left"
                                                ></i></a>
                                                    <!-- <ul id="demo5" class="collapse">
                                                        <li>
                                                            <a href="#">Panels and Wells</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Buttons</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Notifications</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Typography</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> Icons</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Grid</a>
                                                        </li>
                                                    </ul> -->
                                                    <!-- /.nav-second-level -->
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="collapse" data-target="#demo6"><i
                                                        class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<i
                                                        class="fa fa-angle-left"></i></a>
                                                        <!-- <ul id="demo6" class="collapse">
                                                            <li>
                                                                <a href="#">Second Level Item</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Second Level Item</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" data-toggle="collapse" data-target="#demo7">Third Level <i
                                                                    class="fa fa-angle-left"  left:5px;"></i></a>
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
                                                                    /.nav-third-level
                                                                </li>
                                                            </ul> -->
                                                            <!-- /.nav-second-level -->
                                                        </li>
                                                        <li class="active">
                                                            <a href="#" data-toggle="collapse" data-target="#demo8"><i
                                                                class="fa fa-files-o fa-fw"></i> Sample Pages<i class="fa fa-angle-left">
                                                                </i></a>
                                                                <!-- <ul id="demo8" class="collapse">
                                                                    <li>
                                                                        <a class="active" href="#">Blank Page</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Login Page</a>
                                                                    </li>
                                                                </ul> -->
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
                                                                    <a href="#">All Posts</a>
                                                                </li>

                                                                <li>
                                                                    <a href="#">Create Post</a>
                                                                </li>

                                                            </ul>
                                                            <!-- /.nav-second-level -->
                                                        </li>

                                                    </ul>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-9 c0l-sm-12 col-xs-12  bg-dan ger">
                                            <br>
                                            <hr>
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>



                                <!-- Page Content -->


                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                                @yield('footer')
                            </body>
                            </html>
