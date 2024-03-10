@extends('admin.layouts.app')
@push('headerscript')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" />
@endpush
@section('content')

<!-- BEGIN: Content-->

<div class="page-wrapper">
<div class="page-content">
<div class="content-body">
	<div class="container-fluid pt-2 px-3">
		<div class="row">
			<div class="col-xl-12">
				<div class="row mb-2 align-items-center">
					<div class="col-6">
						<h4 class="mb-0">Editers</h4>
					</div>
					<div class="col-6">
						<div class="text-end">
							<a href="{{ url('admin/editers/new') }}" class="btn btn-info shadow  btn-sm "><i class="lni lni-circle-plus me-2"></i>Add New</a>
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
															<input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ request()->get('name') }}" placeholder="Name">
														</div>
														<div class="col-xl-2 col-sm-6">
															<input type="email" class="form-control form-control-sm" id="email" name="email" value="{{ request()->get('email') }}" placeholder="Email">
														</div>
														<div class="col-xl-2 ">
															<select class="form-control form-control-sm" id="status" name="status">
																<option value="">Select Status</option>
																<option @if(request()->get('status')=='1') selected @endif value="1">Active</option>
																<option @if(request()->get('status')=='2') selected @endif value="2">In-Active</option>
															</select>
														</div>
														<div class="col-xl-2 ">
															<input type="text" name="daterange" class="form-control form-control-sm date-range" value="{{request('daterange')}}" placeholder="Select Date Range" autocomplete="off"/>
														</div>
													
														<div class="col-xl-auto col-sm-6">
															<button class="btn btn-info btn-sm" title="Click here to Search" type="submit"><i class="lni lni-search-alt"></i>Search</button>
															<a href="{{ url('admin/editers') }}" class="btn btn-light btn-sm" title="Click here to remove filter" type="button">Reset</a>
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
					
							<div class="table-responsive">
								<table class="table table-ticket-list table-bordered table-striped table-responsive-sm table-sm"
									id="application-tbl1">
									<thead>
										<tr class="bg-light-yellow">
											<th class="text-start text-dark">Name</th>
											<th class="text-start text-dark">Email</th>
											<th class="text-start text-dark">Phone</th>
											<th class="text-start text-dark">Role</th>
											<th class="text-start text-dark">Address</th>
											<th class="text-start text-dark">Create_Date</th>
											<th width="10%" class="text-center text-dark">Status</th>
											<th width="6%" class="text-dark text-center">Action</th>
										</tr>
									</thead>
									<tbody>
									@if ($results->isNotEmpty())
										@php $i=1; @endphp
										@foreach ($results as $row)
											<tr>
												<td class="text-start">{{ $row->name }}</td>
												<td class="text-start">{{ $row->email }}</td>
												<td class="text-start">{{ $row->mobile }}</td>
												<td class="text-start">{{ $row->role_name }}</td>
												<td class="text-start">{{ $row->address }}</td>
												<td class="text-start">{{ dateFormat($row->created_at)}}</td>
												<td class="text-center">
													@if($row->status == '1')
														<label class="btn btn-success btn-sm m-0">Active</label>
													@else
														<label class="btn btn-warning btn-sm m-0">In-Active</label>
													@endif
												</td>
												<td class="text-center pe-0">
													<a href="{{ url('admin/editers/edit/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-title="Edit" class="btn btn-danger shadow btn-sm"><i class="lni lni-pencil-alt"></i></a>
													<a href="{{ url('admin/editers/edit/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-title="Edit" class="btn btn-danger shadow btn-sm"><i class="lni lni-pencil-alt"></i></a>
													<a onclick="return confirm('Are you sure you want to delete this record?')" href="{{ url('admin/editers/delete/'.$row->id) }}" data-bs-toggle="tooltip" data-bs-title="Delete" class="btn btn-dark shadow btn-xs sharp"><i class="lni lni-trash"></i></a>
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
		$(".date-range").flatpickr({
			mode: "range",
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});
</script>	
@endpush