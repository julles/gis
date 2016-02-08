@extends('layouts.layout')
@section('content')

	<div class="row" style="padding-top:20px;"> 

		<div class="col-md-12">
			@if(\Session::has('message'))
				<div class="alert alert-info">
					{{ \Session::get('message') }}
				</div>
			@endif

			{!! Form::open(['class' => 'form-horizontal']) !!}
				  
				<div class="form-group">
					<label class="control-label col-sm-2">Email:</label>
					<div class="col-sm-10">
					 	{!! Form::text('email' , null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Password:</label>
					<div class="col-sm-10">
					 	{!! Form::password('password' , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-default">Login</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection

