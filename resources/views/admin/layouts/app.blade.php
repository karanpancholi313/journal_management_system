<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="images/favicon-32x32.png')}}" type="image/png">
    <link href="{{url('css/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
	<link href="{{url('css/simplebar.css')}}" rel="stylesheet">
	<link href="{{url('css/perfect-scrollbar.css')}}" rel="stylesheet">
	<link href="{{url('css/metisMenu.min.css')}}" rel="stylesheet">
	<!-- loader-->
	<link href="{{url('css/pace.min.css')}}" rel="stylesheet">
	<script src="{{url('js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{url('css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500display=swap" rel="stylesheet">
	<link href="{{url('css/app.css')}}" rel="stylesheet">
	<link href="{{url('css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{url('css/dark-theme.css')}}">
  
	<link rel="stylesheet" href="{{url('css/header-colors.css')}}"> 
    @stack('headerscript')

</head>
<title>Admin</title>

<body>
    <!--wrapper-->
    <body  >
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{url('images/logo-icon.png')}} " class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">JMS</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{url('admin/home')}}" >
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">HOME</div>
					</a>
					 
				</li>
                <li>
					<a href="{{url('admin/editers')}}">
						<div class="parent-icon"><i class="lni lni-users"></i>
						</div>
						<div class="menu-title">Editers</div>
					</a>
				 
				</li>
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Journal Manager</div>
					</a>
					<ul class="mm-collapse">
						 
						<li> <a href="app-invoice.html"><i class="bx bx-radio-circle"></i>Invoice</a>
						</li>
						<li> <a href="app-fullcalender.html"><i class="bx bx-radio-circle"></i>Calendar</a>
						</li>
					</ul>
				</li>
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-cog"></i>
						</div>
						<div class="menu-title">Settings</div>
					</a>
					<ul class="mm-collapse">
						<li> <a href="{{url('admin/roles')}}"><i class="bx bx-radio-circle"></i>Roles</a>
						</li>
					</ul>
				</li>
				
				 
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
	 
		<!--end header -->
		<!--start page wrapper -->
	 
		<header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand gap-3">
                    <div class="mobile-toggle-menu"><i class="bx bx-menu"></i>
                    </div>

                    <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                       
                    </div>


                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center gap-1">
                            <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                                <a class="nav-link" href="avascript:;"><i class="bx bx-search"></i>
								</a>
                            </li>

                            <li class="nav-item dark-mode d-none d-sm-flex">
                                
                            </li>

                            <li class="nav-item dropdown dropdown-app">
                                <div class="dropdown-menu dropdown-menu-end p-0">
                                    <div class="app-container p-2 my-2 ps">
                                        <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                          
                                        </div>
                                        <!--end row-->

                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                                </div>
                            </li>

                            <li class="nav-item dropdown dropdown-large">
                                
                                <div class="dropdown-menu dropdown-menu-end">
                                     
                                    <div class="header-notifications-list ps">
                                        
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                                  
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                              
                                <div class="dropdown-menu dropdown-menu-end">
                                    
                                    <div class="header-message-list ps">
                                               
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                                     
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="@if(empty(Auth::user()->image)){{asset('images/avatar-1.png')}}@else {{asset('user/'.Auth::user()->image)}} @endif" class="user-img" alt="user avatar">
							<div class="user-info">
								<p class="user-name mb-0">{{Auth::user()->name}}</p>
								<p class="designattion mb-0">Admin</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-cog fs-5"></i><span>Settings</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="{{url('logout')}}"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
                   
                </nav>
            </div>
        </header>
        @yield('content') 
  <!-- Bootstrap JS -->
  <script src="{{url('js/bootstrap.bundle.min.js')}}"></script>
  <!--plugins-->
  <script src="{{url('js/jquery.min.js')}}"></script>
  <script src="{{url('js/simplebar.min.js')}}"></script>
  <script src="{{url('js/metisMenu.min.js')}}"></script>
  <script src="{{url('js/perfect-scrollbar.js')}}"></script>
  <script src="{{url('js/jquery-jvectormap-2.0.2.min.js')}}"></script>
  <script src="{{url('js/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script src="{{url('js/chart.js')}}"></script>
  <script src="{{url('js/jquery.sparkline.min.js')}}"></script>
  <!--Morris JavaScript -->
  <script src="{{url('js/raphael-min.js')}}"></script>
  <script src="{{url('js/morris.js')}}"></script>
  <script src="{{url('js/index2.js')}}"></script>
  <script src="{{url('js/select2.min.js')}}"></script>
  <script src="{{url('js/select2-custom.js')}}"></script>
  <!--app JS-->
  <script src="{{url('js/app.js')}}"></script>
  <script src="{{url('js/validation-script.js')}}"></script>
  <script src="{{url('js/jquery.validate.min.js')}}"></script>
  <script src="{{url('js/dataTables.bootstrap5.min.js')}}"></script>
  <script src="{{url('js/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  @if(Session::has('success'))
  <script>
      Toastify({
          text: "{{ Session::get('success') }}",
          duration: 3000,
          gravity: "top", // `top` or `bottom`
          positionLeft: false, // `true` or `false`
          backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
      }).showToast();
  </script>
  @elseif(Session::has('error'))
  <script>
      Toastify({
          text: "{{ Session::get('error') }}",
          duration: 3000,
          gravity: "top", // `top` or `bottom`
          positionLeft: false, // `true` or `false`
          backgroundColor: "linear-gradient(to right, #E20303, #F04A3E)",
      }).showToast();
  </script>
  @endif
    @stack('footerscript')

</body>

</html>