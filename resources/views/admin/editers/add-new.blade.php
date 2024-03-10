@extends('admin.layouts.app')
@push('headerscript')
@endpush
@section('content')
<div class="page-wrapper">
<div class="page-content">
<div class="content-body">
	<div class="container-fluid pt-2 px-3 ">
		<div class="row">
			<div class="col text-start">
				<a href="{{ url('admin/editers') }}" class="btn btn-info btn-sm ">Back to editers</a>	
			</div>
		</div>
		<div class="row mt-3 align-items-center">
			<div class="col-xl-12">
				<div class="card card-bx">
					<div class="card-header p-3">
						<h4 class="title mb-0">{{ isset($user_details) ? 'Edit' : 'Add' }} Editer</h4>
					</div>
					<form novalidate method="POST" action="" enctype="multipart/form-data" id="edituser">
						@csrf
						<div class="row">
							<div class="col-12 col-sm-6">
								<div class="form-group">
									@php
									if (old('name') || old()) {
									$username = old('name');
									}else{
									$username = (isset($user_details)) ? $user_details->name : '';
									}
									@endphp
									<div class="controls" id="username_error">
										<label for="name">Name</label>
										<input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{$username}}" required data-validation-required-message="This Name field is required">
									</div>
									@php
									if ($errors->has('name')) {
									echo '<span class="text-danger">' . $errors->first('name') . '</span>';
									}
									@endphp
								</div>
							   
								<div class="form-group">
									@php
									if (old('email') || old()) {
									$email = old('email');
									}else{
									$email = (isset($user_details)) ? $user_details->email : '';
									}
									@endphp
									<div class="controls" id="email_error">
										<label for="email">E-mail</label>
										<input type="email" class="form-control" placeholder="Email" value="{{$email}}" name="email" id="email" required data-validation-required-message="This email field is required">
									</div>
									@php
									if ($errors->has('email')) {
									echo '<span class="text-danger">' . $errors->first('email') . '</span>';
									}
									@endphp
								</div>
								<div class="form-group" id="phone_error">
									@php
									if (old('phone') || old()) {
									$phone = old('phone');
									}else{
									$phone = (isset($user_details)) ? $user_details->mobile : '';
									}
									@endphp
									<label for="phone">Phone</label>
									<input id="phone" class="form-control" type="text" value="{{$phone}}" name="phone" aria-label="Please enter your phone number" >
									@php
									if ($errors->has('phone')) {
									echo '<span class="text-danger">' . $errors->first('phone') . '</span>';
									}
									@endphp
								</div>
							  
							</div>
							<div class="col-12 col-sm-6">
								   @php
									if (old('role') || old()) {
									$role = old('role');
									}else{
									$role = (isset($user_details)) ? $user_details->role_id : '';
									}
									@endphp
								<div class="form-group" >
									<label for="role">Role</label>
									<select class="form-control select2" name="role" id="role"> 
										<option value="">Select Role</option>
										<option value="2" @if(isset($user_details) && $user_details->roles == 2) selected @endif>Editer</option>
									</select>
								   
									   @php
									if ($errors->has('role')) {
									echo '<span class="text-danger">' . $errors->first('role') . '</span>';
									}
									@endphp
								</div>
							   
								<div class="form-group" >
									@if(isset($user_details->image) && $user_details->image != "")
									<div class="media mb-2">
										<a class="mr-2" href="#">
											<img src="{{ (!empty($user_details->image) && Storage::exists('public/uploads/users/' . $user_details->image)) }}" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
										<input type="checkbox" name="deletefile" id="deletefile" class="cursor-pointer" value="{{$user_details->image}}"> <label for="deletefile" class="cursor-pointer">Remove</label>
										</a>
									</div>
								@endif
									<label for="image">Image</label>
									<input type="file" class="form-control" name="image" id="image">
									  @php
											if ($errors->has('image')) {
												echo '<span class="text-danger">' . $errors->first('image') . '</span>';
											}
										@endphp
								</div>
								<div class="form-group" >
									<label for="status">Status</label>
									<select class="form-select form-select-sm" name="status" id="status">
										<option value="">Select Status</option>
										<option value="1" @if(isset($user_details) && $user_details->status == 1) selected @endif>Active</option>
										<option value="2" @if(isset($user_details) && $user_details->status == 2) selected @endif>In-Active</option>
									</select>
								</div>
								@if(empty($user_details))
								<div class="form-group mb-1">
									@php
										if (old('password') || old()) {
											$password = old('password');
										} 
									@endphp
									<div class="controls" id="password_error">
										<label for="password" class="m-0">Password</label>
										<input type="password" class="form-control"
											value="{{ $password ?? '' }}" name="password" id="password"
											placeholder="Password">
									</div>
									@php
										if ($errors->has('password')) {
											echo '<span class="text-danger">' . $errors->first('password') . '</span>';
										}
									@endphp
								</div>
								<div class="form-group mb-1">
									@php
										if (old('confirm_password') || old()) {
											$confirm_password = old('confirm_password');
										} 
									@endphp
									<div class="controls" id="confirm_password_error">
										<label for="confirm_password" class="m-0">Confirm Password</label>
										<input type="password" class="form-control"
											value="{{ $confirm_password ?? '' }}" name="confirm_password"
											id="confirm_password" placeholder="Confirm Password"
											required
											data-validation-required-message="This name field is required">
									</div>
									@php
										if ($errors->has('confirm_password')) {
											echo '<span class="text-danger">' . $errors->first('confirm_password') . '</span>';
										}
									@endphp
								</div>
							   @endif
							   <div class="form-group mb-1">
								@php
									if (old('address') || old()) {
										$address = old('address');
									}else{
										$address = (isset($user_details)) ? $user_details->address : '';
									} 
								@endphp
								<div class="controls" >
									<label for="address" class="m-0">Address</label>
									<input type="text" class="form-control"
										value="{{ $address }}" name="address"
										id="address">
								</div>
							</div>
							</div>
					   
							<div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
								<button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">{{ isset($user_details) ? 'Update' : 'Create' }}
									</button>
								<a href="{{ url('admin/editers') }}" type="reset" class="btn btn-light">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!-- END: Content-->
@endsection
@push('footerscript')
<script src="{{ asset('app-assets/js/jquery.validate.js') }}"></script>
<script>
$(function() {
	jQuery.validator.addMethod("subject_regex", function(value, element) {
		var regex2s = /^[a-zA-Z\. ]+$/;
		if (regex2s.test(value)) {
			return true;
		} else {
			return this.optional(element)
		}
	}, 'The field is not in the correct format.');
	
	$('form#FormSubmitID').validate({
		errorClass: "text-danger font-sm divwidth",
		errorElement: "div",
		highlight: function(element) {
			$(element).removeClass("text-danger font-sm divwidth");
		},
		rules: {
			title: {
				required: true,
				subject_regex: true
			},
			status_flag: {
				required: true
			}			
		},
		messages: {		
			title: {
				remote: "Title already exists."
			}
		},
		submitHandler: function(form) {
			$('form#FormSubmitID button#btnsub').addClass('disabled').attr("disabled", true).text('Processing...');
			form.submit();
		}
	});
});
</script>
@endpush