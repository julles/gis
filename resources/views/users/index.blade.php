@extends('layouts.layout')
@section('content')

	<div class="row" style="padding-top:20px;"> 

		<div class="col-md-12">
			
			@if(\Session::has('message'))
				<div class="alert alert-info">
					{{ \Session::get('message') }}
				</div>
			@endif

			<a class="btn btn-primary btn-sm" href = "{{ Helper::url('create') }}">Add New</a>
			
			<hr/>
			
			<table class="table">
				<thead>
					<tr>
						<td>Role</td>
						<td>Name</td>
						<td>Email</td>
						<td>Phone</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					
				</tbody>

			</table>
		</div>
	</div>

@endsection

@section('script')
	
	<script type="text/javascript">
	$.fn.dataTable.ext.errMode = 'none';
	$(document).ready(function(){
		 $('.table').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax : '{{ Helper::url("data") }}',
	        columns: [
	            { data: 'role_name', name: 'roles.name' },
	            { data: 'fullname', name: 'fullname' },
	            { data: 'email', name: 'email' },
	            { data: 'phone', name: 'phone' },
	            { data: 'action', name: 'action' ,"searchable": false ,'orderable' : false},
	        ]
	    });

	});

	</script>

@endsection