<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Journal Management System') }}</title>
        <!-- Fonts -->
         <!--plugins-->
    <!--plugins-->
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
    <body class="font-sans antialiased">
        <div class="wrapper">
            <!--sidebar wrapper -->
            <div class="sidebar-wrapper" data-simplebar="true">
                <div class="sidebar-header">
                    <div>
                        <img src="{{asset('images/logo.png')}} " class="logo-icon" alt="logo icon">
                    </div>
                    <div>
                        <h4 class="logo-text">JMS</h4>
                    </div>
                    {{-- <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
                    </div> --}}
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
                        <a href="{{url('admin/users')}}">
                            <div class="parent-icon"><i class="lni lni-users"></i>
                            </div>
                            <div class="menu-title">Users</div>
                        </a>
                     
                    </li>
					<li>
						<a href="javascript:0;" class="has-arrow">
							<div class="parent-icon"><i class="bx bx-category"></i>
							</div>
							<div class="menu-title">Journal Management</div>
						</a>
						
						<ul class="mm-collapse">
							<li> <a href="app-emailbox.html"><i class='bx bx-radio-circle'></i>Email</a>
							</li>
							<li> <a href="app-chat-box.html"><i class='bx bx-radio-circle'></i>Chat Box</a>
							</li>
							<li> <a href="app-file-manager.html"><i class='bx bx-radio-circle'></i>File Manager</a>
							</li>
							<li> <a href="app-contact-list.html"><i class='bx bx-radio-circle'></i>Contatcs</a>
							</li>
							<li> <a href="app-to-do.html"><i class='bx bx-radio-circle'></i>Todo List</a>
							</li>
							<li> <a href="app-invoice.html"><i class='bx bx-radio-circle'></i>Invoice</a>
							</li>
							<li> <a href="app-fullcalender.html"><i class='bx bx-radio-circle'></i>Calendar</a>
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
							
                        </div>
                        <div class="user-box dropdown px-3">
                            <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret has-arrow" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="@if(empty(Auth::user()->image)){{asset('images/avatar-1.png')}}@else {{asset('user/'.Auth::user()->image)}} @endif" class="user-img" alt="user avatar">
                                 <div class="user-info">
                                    <p class="user-name mb-0">{{Auth::user()->name}}</p>
                                    <p class="designattion mb-0">ADMIN</p>
                                </div>
                                </a><button class="btn btn-danger text-white radius-30 px-4 mx-5 " type="submit"><a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret has-arrow" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a><a href="{{url('logout')}}"><span class="text-white">Logout</span></a>
                                </button>
                            
                          
                        </div>
                    </nav>
                </div>
            </header>

           @yield('content') 
        
          <!-- Bootstrap JS -->


@stack('footerscript')
    </body>
</html>
