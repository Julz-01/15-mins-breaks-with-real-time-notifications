<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="img/LS-Logo-landscape.png">

  <title>LinkServeSystem</title>

  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/bootstrap-datetimepicker.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/flipclock.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('daterangepicker/daterangepicker.css')}}">
</head>
<body>
  <div class="main-wrapper">

    <div class="header">
      <div class="header-left">
        <a href="{{url('home')}}" class="logo">
          <img src="{{ asset('img/LS-Logo-landscape.png')}}" width="100" alt="Linkserve Solutions Logo">

        </a>
      </div>
      <div class="page-title-box pull-left">
        <!-- <h3>  {{ config('app.name', 'Laravel') }}</h3> -->
      </div>
      <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <ul class="nav navbar-nav navbar-right user-menu pull-right">


                    </ul>
                    <div class="dropdown mobile-user-menu pull-right">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">

                    </ul>
                  </div>
                </div>



                <div class="sidebar" id="sidebar">
                  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 566px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 566px;">
                    <div id="sidebar-menu" class="sidebar-menu">
                      <ul>
                        <br>
                        <li>
                          <div class="profile-img">
                            <a href="#" class="avatar">{{substr(Auth::user()->name,0,1)}}</a>
                          </div>
                        </li>
                        <li>
                         <a href="#"><h3 class="text-light text-center" style="margin-top: 5%;">{{Auth::user()->name}}</h3></a>
                       </li>
                       <li><a href="{{url('home')}}"><i class="fa fa-dashboard">&nbsp;&nbsp;</i>Main Dashboard</a></li>
                       <li><a href="{{url('get_profile')}}"><i class="fa fa-user">&nbsp;&nbsp;&nbsp;</i>Profile</a> </li>
                        <li><a href="{{url('request')}}"><i class="fa fa-envelope">&nbsp;&nbsp;</i>Request</a></li>
                       @if(Auth::user()->employeetype=='Employee')
                       @endif
                       <div class="text-center" style="margin-top: 5%;">
                         <li><button class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">Log Out</button></li>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                      </div>
                            </ul>
                          </div>
                        </div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 381.376px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                      </div>

                      <div class="page-wrapper" style="min-height: 626px;">
                        <div class="content container-fluid">
                          @yield('content')

                        </div>
                      </div>
                    </div>
                    <script type="text/javascript" src="{{asset('plugin-js/jquery-3.2.1.min.js')}}"></script>
                    <script type="text/javascript" src="{{asset('plugin-js/bootstrap.min.js')}}"></script>
                    <script type="text/javascript" src="{{asset('plugin-js/jquery.dataTables.min.js')}}"></script>
                    <script type="text/javascript" src="{{asset('plugin-js/jquery.slimscroll.js')}}"></script>
                    <script type="text/javascript" src="{{asset('plugin-js/select2.min.js')}}"></script>
                    <script type="text/javascript" src="{{asset('plugin-js/moment.min.js')}}"></script>
                    <script type="text/javascript" src="{{asset('plugin-js/flipclock.min.js')}}"></script>
                    <script type="text/javascript" src="{{asset('plugin-js/counter.js')}}"></script>
                    <script type="text/javascript" src="{{asset('plugin-js/bootstrap-datetimepicker.min.js')}}"></script>
                    <script type="text/javascript" src="{{asset('plugin-js/app_template.js')}}"></script>
                    <script type="text/javascript" src="{{asset('plugin-js/dev.js')}}"></script>
                    <script type="text/javascript" src="{{asset('daterangepicker/daterangepicker.js')}}"></script>

                  </body>
                  </html>
