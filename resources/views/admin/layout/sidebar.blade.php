@if(Auth::user()->type == 'admin')
<div class="sidebar" id="sidebar">
	<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 566px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 566px;">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li >

					<a href="{{url ('admin/home')}}" ><span><i class="fa fa-dashboard">&nbsp;&nbsp;</i>Main Dashboard</span> </a>

				</li>

				<li >

					<a href="{{url ('get_announce')}}" ><span><i class="fa fa-bullhorn">&nbsp;&nbsp;</i>Announcements</span> </a>

				</li>

 
<li class="submenu">
					<a href="#" ><span><i class="fa fa-database">&nbsp;&nbsp;</i>Employees Database</span> <span class="menu-arrow"></span></a>
					<ul class="list-unstyled" style="display: none;">
						<li><a href="{{url ('get_employees')}}"><i class="fa fa-user">&nbsp;&nbsp;</i>Employees</a></li>
						<li><a href="{{url('get_admins')}}"><i class="fa fa-user-secret">&nbsp;&nbsp;</i>Admins</a></li>
						<li><a href="{{url('new_user')}}"><i class="fa fa-user-plus">&nbsp; &nbsp;</i>Add User</a></li>
					</ul>
				</li>

				<li class="submenu">
					<a href="#" ><span><i class="fa fa-clock-o">&nbsp;&nbsp;</i>Time Sheet</span> <span class="menu-arrow"></span></a>
					<ul class="list-unstyled" style="display: none;">
						<li><a href="{{url ('get_timesheet')}}"><i class="fa fa-user">&nbsp;&nbsp;</i>Employees</a></li>
						<li><a href="{{url ('admin_timesheet')}}"><i class="fa fa-user-secret">&nbsp;&nbsp;</i>Admin</a></li>
					</ul>
				</li>
				<li>

					<a href="{{url ('get_leave')}}" ><span><i class="fa fa-envelope">&nbsp;&nbsp;</i>Request Log</span>
					<span class="badge badge-pill bg-primary float-right" id="notif"></span>
				</a>
				<div class=""  aria-labelledby="dropdownMenuLink">


				</div>
				</li>

			</ul>
		</div>
		<div class="text-center" style="margin-top: 3%;">
                         <li><button class="btn btn-danger ml" align="center" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">Log Out</button></li>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                      </div>
	</div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 381.376px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
</div>
@else
<div class="sidebar" id="sidebar">
	<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 566px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 566px;">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li>
					<a href="{{url('/admin/home')}}"><span>Main Dashboard</span> </a>

				</li>
				<li class="submenu">
					<a href="#" ><span>Employees Database</span> <span class="menu-arrow"></span></a>
					<ul class="list-unstyled" style="display: none;">
						<li><a href="{{url ('get_employees')}}">Employees</a></li>
						<li><a href="{{url('get_admins')}}">Admins</a></li>
					</ul>
				</li>

				<li class="submenu">
					<a href="#" ><span>Time Sheet</span> <span class="menu-arrow"></span></a>
					<ul class="list-unstyled" style="display: none;">
						<li><a href="{{url ('get_timesheet')}}">Employees</a></li>
						<li><a href="{{url ('admin_timesheet')}}">Admin</a></li>
					</ul>
				</li>

				<li>

					<a href="{{url ('get_leave')}}" ><span>Request Log</span>
					<span class="badge badge-pill bg-primary float-right" id="notif"></span>
				</a>
				<div class=""  aria-labelledby="dropdownMenuLink">


				</div>
				</li>
			</ul>
		</div>
		<div class="text-center" style="margin-top: 3%;">
                         <li><button class="btn btn-danger ml" align="center" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">Log Out</button></li>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                      </div>
	</div>
	<div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 381.376px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
</div>
@endif
