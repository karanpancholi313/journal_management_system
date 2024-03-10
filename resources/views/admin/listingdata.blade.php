<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
    
    <style>
        .dataTables_length,label{
            display: inline-flex !important;
            margin-bottom: 8px;

        }
        .dataTables_filter,label{
            float: right;
        }
        .dataTables_paginate {
            float: right;
    margin-top: 14px;
        }
        .dataTables_info {
           
    margin-top: 27px;
        }
    </style>
</head>
<body>
 
    @include('admin/navbar')
 

 
 
    <div class="page-wrapper">
        <div class="page-content">
    <div class="card">
        <div class="card-body">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                         
                    </div>
                    <!--    <div class="ms-auto"><a href="{{url('client/listing')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Listing</a> -->
              
                <form action="" >
                 <div class="row">
                    <div class="col-md-4 form-group">
                        @php
                        $date = date('Y-m-d');
                        @endphp
                        <label style="float: left; " for="">Start Date </label>
                        <input type="date" name="start" value="{{$date}}" id="start" class="form-control" >
                     </div>
                     <div class="col-md-4 form-group">
                        <label style="float: left; " for="">End Date</label>
                        <input type="date" name="end" value="{{$date}}" id="end" class="form-control"  >
                    </div>
                   
                     <div class="col-md-4 form-group" style="margin-top:25px;">
                        <input type="button" class="btn btn-primary" onclick="myfunction()" value="Search">
                     </div>
                 </div>
            </form>
           
            <div class="col-md-2 form-group">
                        
                        
                        <label style="float: left; " for="">Select Username</label>
                           <select   class="form-select form-select-sm username" name="username" id="username" data-placeholder="Choose one thing">
                               <option>Select Username</option>
                               @php 
                              $userssssss = DB::table('listings')->get();
                              $i='1';
                            @endphp
                               @foreach ($userssssss as $username)
                                   @php
                                           $usersss = DB::table('client_logs')->where('id', $username->name)->first();
                                   @endphp
                               <option value="{{$usersss->id ?? ''}}">{{$usersss->name  ?? ''}}</option>
                               @endforeach
                                
                           </select>
                      
                     </div>   
                </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Residential</th>
                            <th>Bhk</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Furnishing</th>
                            <th>Location</th>
                            <th>Ownership</th>
                            <th>Leanarea</th>
                            <th>Facing</th>
                            <th>Possession</th>
                            <th>Lumsumprice</th>
                            <th>localitys</th>
                            
                            <th>Update Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyAA" class="text-center">
                        @php
                        $userssssss = DB::table('listings')->get();
                        $i='1';
                        @endphp
        
                        @foreach ($userssssss as $user)
                        
                      @php
                      $name = DB::table('client_logs')->where('id',$user->name)->first();
                      $bhks = DB::table('bhks')->where('id',$user->bhk)->first();
                      $residential = DB::table('properties')->where('id',$user->residential)->first();
                      $state = DB::table('states')->where('id',$user->state)->first();
                      $city = DB::table('cities')->where('id',$user->city)->first();
                      $salepriority = DB::table('salepriorities')->where('id',$user->salepriority)->first();
                      $aaa = explode(',',$user->localitys);
                        $citys="";
                                 foreach($aaa as $avs){
                                     $City = DB::table('localities')->where('id', $avs)->first();
                                      $citys.= $City->localitys ?? ''." ";   
                                 }
                      @endphp                        <tr>
                      <td>{{$loop->iteration}}</td>
                            <td>{{$name->name ?? ''}}</td>
                            <td>{{$residential->residential ?? ''}}</td>
                            <td>{{$bhks->bhk ?? ''}}</td>
                            <td>{{$state->state ?? ''}}</td>
                            <td>{{$city->city ?? ''}}</td>
                            <td>{{$salepriority->salepriority ?? ''}}</td>
                            <td>{{$user->location}}</td>
                            <td>{{$user->ownership}}</td>
                            <td>{{$user->leanarea}}</td>
                            <td>{{$user->approvedstatus	}}</td>
                            <td>{{$user->possession}}</td>
                            <td>{{$user->lumsumprice}}</td>
                            <td>{{$citys}}</td>

                            
                            <td>
                            <form action="" method="post">
                            <input type="hidden" name="location" value="{{$user->location}}">
                            <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Verified" data-off="Unverified" {{ $user->status ? 'checked' : '' }}>
                        </form>
                            </td>
                            <td>
											<div class="d-flex order-actions">
												<a href="{{"editlistingdata/".$user->id}}" class=""><i class="bx bxs-edit"></i></a>
												<a href="{{"deletelistingdata/".$user->id}}" class="ms-3"><i class="bx bxs-trash"></i></a>
											</div>
										</td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "GET", 
            url:"{{route('changeStatuslistingdata')}}",
            dataType: "json",
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>

    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>   -->
    <script>
	 
 
     $(document).ready(function(){
       $("#username").on('change',function(){  
            var username = $(this).val();
            
            $.ajax({
               url:"{{route('listingdata')}}",
               type:"GET",
               data:{'username':username},
               success:function(data){
           
                  $("#tbodyAA").html(data);
               }
            });
       });
     });
   



     function myfunction(){ 
       var start=document.getElementById("start").value; 
       var end=document.getElementById("end").value; 
       $.ajax({
       type : 'get',
       url:"{{route('listingdata')}}",
       data:{'start':start,'end':end},
       success:function(data) {
       $('#tbodyAA').html(data);
       }
       });
       };
</script>
 
 
                      </body>
</html> 