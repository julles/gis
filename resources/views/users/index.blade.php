@extends('layouts.layout')
@section('content')

	<div class="row" style="padding-top:20px;"> 

		<div class="col-md-12">
			<a class="btn btn-primary btn-sm" href = "{{ Helper::url('create') }}">Add New</a>
			<hr/>
			<table class="table">
				<thead>
					<tr>
						<td>Name</td>
						<td>Email</td>
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

	$(document).ready(function(){

		$('.table').DataTable();

	});

	</script>

@endsection