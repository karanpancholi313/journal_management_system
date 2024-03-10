

<!doctype html>
<html lang="en">

<head>
 
	<title>Login</title>
</head> 
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- CSS -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" />

<!-- Script -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<body class="">
	@include('f_header') 	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-4">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card my-5 my-lg-0 shadow-none border">
							<div class="card-body">
								<div class="p-4">
									<div class="text-center mb-4">
										<h5 class="">Hello! User</h5>
										<p class="mb-0">Please log in to your account</p>
									</div>
                                    <p class="alert alert-info" style="display:none;" id="potp"></p>
									<div class="form-body">
										<form class="row g-3" method="POST" action=" " id="form-data">
                                                        @csrf
                                                        <div class="form-group mb-3">
                                            <input type="text" placeholder="Mobile Number" id="mobile" class="form-control" name="mobile" required
                                                autofocus>
                                           
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" placeholder="Otp" id="otp" class="form-control" name="otp">
                                            
                                        </div>
											<div class="col-12">
												<div class="d-grid">
													<button type="button" id="information" onclick="Next6();" class="btn btn-primary">Sign in</button>
													<button type="button" style="display:none;"  id="information1" onclick="Next7();" class="btn btn-primary">Sign in</button>

												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
		 
	</div>

    <script>
            function Next6() {
          var mobile = document.getElementById("mobile").value;
      
        if (mobile != "" ) {
            
            $.ajax({
                type: "GET",
                url: "{{route('mobileotp')}}",
                data: {
                    mobile: mobile,
                },
                success: function (data) {
                    $("#potp").text("Your Otp : " + data);
                    document.getElementById("information").style.display = "none";
                    document.getElementById("potp").style.display = "block";
                    document.getElementById("information1").style.display = "block";
    
                },
            });
        }
    }

    function Next7() {
        var otp = document.getElementById("otp").value;
        var localitydataid = "https://dbssms.in/property/buyerdata";
        
       
            var data = $("#form-data").serialize();

            $.ajax({
                type: "GET",
                url: "{{route('dataotpmobile11')}}",
                data: data,
                success: function (data) {
                    if (data == 1) {
                        window.location.href = localitydataid;
                    } else {
                        $("#otperror").text("otp is invailid.");
                    }
                },
            });
        
    }
    </script>
 
 
</body>

</html>