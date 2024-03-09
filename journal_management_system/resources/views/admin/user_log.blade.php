<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="images/favicon-32x32.png" type="image/png">
 
</head>
<title>User</title> 
<!--start page wrapper -->
@include('admin/navbar')
 
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                         
                    </div>
                    <div class="ms-auto"><a href="{{url('admin/adduser_log')}}"
                        class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New User</a>
                </div>
                     
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Password</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php
                                $users = DB::table('user_logs')->get();
                            @endphp
                            @foreach ($users as $user)
                            <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->password}}</td>
                                    <td>
											<div class="d-flex order-actions">
												<a href="{{"edit_user_log/".$user->id}}" class=""><i class="bx bxs-edit"></i></a>
												<a href="{{"deleteuser/".$user->id}}" class="ms-3"><i class="bx bxs-trash"></i></a>
											</div>
										</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
</div>
 
 
<!--end page wrapper -->