@extends('layouts.layout')
@section('content')

	<div class="row" style="padding-top:20px;"> 

		<div class="col-md-12">

			@if($errors->count() > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)

							<li>{{ $error }}</li>

						@endforeach
					</ul>

				</div> 
			@endif

			{!! Form::model($model , ['class' => 'form-horizontal']) !!}
				  
				<div class="form-group">
					<label class="control-label col-sm-2">Name:</label>
					<div class="col-sm-10">
					 	{!! Form::text('fullname' , null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Role:</label>
					<div class="col-sm-10">
					 	{!! Form::select('role_id' , $roles ,null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Email:</label>
					<div class="col-sm-10">
					 	{!! Form::text('email' , null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Phone:</label>
					<div class="col-sm-10">
					 	{!! Form::text('phone' , null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Password:</label>
					<div class="col-sm-10">
					 	{!! Form::password('password'  , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Verify Password:</label>
					<div class="col-sm-10">
					 	{!! Form::password('verify_password'  , ['class' => 'form-control']) !!}
					</div>
				</div>
				 
				<div class="form-group">
					<label class="control-label col-sm-2">Status:</label>
					<div class="col-sm-10">
					 	{!! Form::select('status' ,['0' => 'active' , '1' => 'in active'], null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection

