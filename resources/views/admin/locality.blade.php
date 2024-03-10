<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="images/favicon-32x32.png" type="image/png">
 
</head>
<title>Locality</title> 
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
                        <li class="breadcrumb-item active" aria-current="page">Locality</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                    @if(Session::has('message'))
 
 <div class="alert alert-info border-0 bg-info alert-dismissible fade show py-2">
       <div class="d-flex align-items-center">
           <div class="font-35 text-dark"><i class='bx bx-info-square'></i>
           </div>
           <div class="ms-3">
               <h6 class="mb-0 text-dark"> {{ Session::get('message') }}</h6>
                
           </div>
       </div>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
@endif
                    </div>
                    <div class="ms-auto"><a href="{{url('admin/add_locality')}}"
                        class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Locality</a>
                </div>
                     
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 ">
                        <thead class="table-dark ">
                            <tr  >
                                <th>Id</th>
                                <th>State Name</th>
                                <th>City Name</th>
                                <th>Locality Name</th>
                                <th>Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody >
                            @php
                                $users = DB::table('localities')->get();
                            @endphp
                            @foreach ($users as $user)
                            @php
                                $state1 = DB::table('states')->where('id',$user->state)->first();                           
                                $cities = DB::table('cities')->where('id',$user->city)->first();
                                
                            @endphp
                            <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$state1->state ?? ''}}</td>
                                    <td>{{$cities->city ?? ''}}</td>
                                    <td>{{$user->localitys}}</td>
                                    
                                     <td>
											<div class="d-flex order-actions">
												<a href="{{"edit_locality/".$user->id}}" class=""><i class="bx bxs-edit"></i></a>
												<a href="{{"dellocality/".$user->id}}" class="ms-3"><i class="bx bxs-trash"></i></a>
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
