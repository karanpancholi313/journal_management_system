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
				<a href="{{ url('admin/roles') }}" class="btn btn-info  btn-sm ">Back to roles</a>	
			</div>
		</div>
		<div class="row mt-3 align-items-center">
			<div class="col-xl-12">
				<div class="card card-bx">
					<div class="card-header p-3">
						<h4 class="title mb-0">{{ isset($role) ? 'Edit' : 'Add' }} Role</h4>
					</div>
					<form action="{{ (isset($role)) ? htmlentities(filter_var(url('admin/roles/edit/'.$role->id), FILTER_SANITIZE_SPECIAL_CHARS)) : htmlentities(filter_var(url('admin/roles/new'), FILTER_SANITIZE_SPECIAL_CHARS)) }}" method="post" autocomplete="off" class="profile-form" id="FormSubmitID">
                		@csrf
						<div class="card-body p-3">
							<div class="row">
								<div class="col-sm-3 mb-2">
									@php
										$title = '';
										if (old('title') || old()) {
											$title = old('title');
										}else{
											$title = (isset($role)) ? $role->title : '';
										}
									@endphp
									<label for="title" class="form-label mb-0 text-dark">Title <span class="text-danger">*</span></label>
									<div class="input-group input-group-new">
										<input type="text" class="form-control form-control-sm solid rounded" id="title" name="title" value="{{$title}}" autocomplete="off" />
									</div>
									@php
										if ($errors->has('title')) {
											echo '<span class="text-danger">' . $errors->first('title') . '</span>';
										}
									@endphp
								</div>
								<div class="col-sm-3 mb-2 form-select-new">
									@php
										if (old('status') || old()) {
											$status_flag = old('status');
										} else {
											$status_flag = isset($role) ? $role->status : '';
										}
									@endphp
									<label class="form-label mb-0 text-dark">Status <span class="text-danger">*</span></label>
									<select class="nice-select default-select form-control form-control-sm" name="status" id="status">
										<option value="">Select Status</option>
										<option {!! $status_flag == '1' ? ' selected' : '' !!} value="1">Active</option>
										<option {!! $status_flag == '2' ? ' selected' : '' !!} value="2">In-Active</option>
									</select>
									@php
										if ($errors->has('status')) {
											echo '<span class="text-danger">' . $errors->first('status') . '</span>';
										}
									@endphp
								</div>
							</div>
						</div>
						<div class="py-3 px-3">
							<button id="btnsub" class="btn btn-primary btn-sm px-4">{{ isset($role) ? 'Update' : 'Create' }}</button>
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