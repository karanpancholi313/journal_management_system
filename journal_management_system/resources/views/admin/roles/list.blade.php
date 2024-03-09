@extends('admin.layouts.app')
@push('headerscript')
@endpush
@section('content')
<script>
function valthisform(){
    var checkboxs = document.getElementsByName("ids[]");
    var okay = false;
    for(var i=0,l=checkboxs.length;i<l;i++){
        if(checkboxs[i].checked){
      		okay=true;
        }
    }
    if(okay){
    	var confirm_val = confirm('Are You Sure?');
    	if(confirm_val){
      		return true;
    	}else{
      		return false;
    	}
  	}else{ 
    	alert("At least 1 item(s) must be selected");
    	return false;
  	}
}
</script>
<!-- BEGIN: Content-->

<div class="page-wrapper">
<div class="page-content">
<div class="content-body">
	<div class="container-fluid pt-2 px-3">
		<div class="row">
			<div class="col-xl-12">
				<div class="row mb-2 align-items-center">
					<div class="col-6">
						<h4 class="mb-0">Roles</h4>
					</div>
					<div class="col-6">
						<div class="text-end">
							<a href="{{ url('admin/roles/new') }}" class="btn btn-info shadow  btn-sm "><i class="lni lni-circle-plus me-2"></i>Add New</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card h-inherit mb-2">
							<div class="card-body p-2">
								<form class="form-search" action="" method="get" autocomplete="off" id="FormSubmitID">
									<input type="hidden" name="search" value="yes">
									<div class="accordion filter-header" id="accordion-one">
										<div class="accordion-item mb-0">
											<h2 class="accordion-header py-0">
												<button class="p-1 accordion-button collapsed filter-button"
													type="button" data-bs-toggle="collapse"
													data-bs-target="#default-collapseOne" aria-expanded="@if(request()->get('search')) true @else false @endif"
													aria-controls="default-collapseOne">
													<div class="cpa filter-text">
														<i class="fa-sharp fa-solid fa-filter me-2"></i>Filter
													</div>
												</button>
											</h2>
											<div id="default-collapseOne" class="accordion-collapse collapse @if(request()->get('search')) show @endif" data-bs-parent="#accordion-one" style="">
												<div class="accordion-body pt-3">
													<div class="row ticket-filter-row">
														<div class="col-xl-2 col-sm-6">
															<input type="text" class="form-control form-control-sm" id="title" name="title" value="{{ request()->get('title') }}" placeholder="Title">
														</div>
														<div class="col-xl-2 ">
															<select class="form-control form-control-sm" id="status" name="status">
																<option value="">Select Status</option>
																<option @if(request()->get('status')=='1') selected @endif value="1">Active</option>
																<option @if(request()->get('status')=='2') selected @endif value="2">In-Active</option>
															</select>
														</div>
														<div class="col-xl-auto col-sm-6">
															<button class="btn btn-info btn-xs" title="Click here to Search" type="submit"><i class="fa fa-search me-1"></i>Search</button>
															<a href="{{ url('admin/roles') }}" class="btn btn-light btn-xs" title="Click here to remove filter" type="button">Reset</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="d-sm-flex d-block justify-content-end align-items-center mt-2 mb-2"></div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body p-3">
						@if(Session::has('sess_mess'))
							<div class="alert alert-success solid alert-dismissible">
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>{{Session::get('sess_mess')}}
							</div>
						@endif
						@if(Session::has('error_mess'))
							<div class="alert alert-danger solid alert-dismissible">
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>{{Session::get('error_mess')}}
							</div>
						@endif
						<form action="{{ url('skillsdeleteall') }}" method="post" id="form_submit" onsubmit="return valthisform();">
							@csrf
							<div class="table-responsive">
								<table class="table table-ticket-list table-bordered table-striped table-responsive-sm table-sm"
									id="application-tbl1">
									<thead>
										<tr class="bg-light-yellow">
											{{-- <th width="3%">
												<div class="form-check ms-2">
													<input class="form-check-input" type="checkbox" class="ace" id="checkAll4">
													<label class="form-check-label" for="checkAll4"></label>
												</div>
											</th> --}}
											<th class="text-start text-dark">Title</th>
											<th width="10%" class="text-center text-dark">Status</th>
											<th width="6%" class="text-dark text-center">Action</th>
										</tr>
									</thead>
									<tbody>
									@if ($results->isNotEmpty())
										@php $i=1; @endphp
										@foreach ($results as $row)
											<tr>
												{{-- <td class="tbl-bx">
													<div class="form-check ms-2">
														<input class="form-check-input" type="checkbox" class="ace" name="ids[]" value="{{ $row->id }}" id="customCheckBox">
														<label class="form-check-label" for="customCheckBox"></label>
													</div>
												</td> --}}
												<td class="text-start">{{ $row->title }}</td>
												<td class="text-center">
													@if($row->status == '1')
														<label class="btn btn-success btn-sm m-0">Active</label>
													@else
														<label class="btn btn-warning btn-sm m-0">In-Active</label>
													@endif
												</td>
												<td class="text-center pe-0">
													<a href="{{ url('admin/roles/edit/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-title="Edit" class="btn btn-danger shadow btn-sm"><i class="lni lni-pencil-alt"></i></a>
													{{-- <a onclick="return confirm('Are you sure you want to delete this record?')" href="{{ url('skills/delete/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-title="Delete" class="btn btn-dark shadow btn-xs sharp"><i class="fa fa-trash"></i></a> --}}
												</td>
											</tr>									
											@php $i++; @endphp
											@endforeach
										@else
											<tr>
												<td colspan="10" class="text-center font-weight-bold">No skill found!</td>
											</tr>
										@endif									
									</tbody>
								</table>
							</div>
							@if ($results->isNotEmpty())
								{{-- <div class="row">
									<div class="col-xl-12">
										<input type="submit" value="Delete" name="submit" class="btn btn-danger btn-sm">
										<input type="submit" value="Active" name="submit" class="btn btn-success btn-sm">
										<input type="submit" value="In-Active" name="submit" class="btn btn-warning btn-sm">
									</div>
								</div> --}}
							@endif
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			{{ $results->appends(request()->query())->onEachSide(1)->links('pagination.default') }}			
		</div>
	</div>
</div>
<!-- END: Content-->
@endsection
@push('footerscript')
@endpush