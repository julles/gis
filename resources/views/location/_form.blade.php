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

			{!! Form::model($model , ['class' => 'form-horizontal' , 'enctype' => 'multipart/form-data']) !!}
				
				<div class="form-group">
					<label class="control-label col-sm-2">User:</label>
					<div class="col-sm-10">
					 	{!! Form::select('user_id' , ['' => 'Select User'] + $userLists , null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Location Category:</label>
					<div class="col-sm-10">
					 	{!! Form::select('location_category_id' , ['' => 'Select Category'] + $categoryLists , null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Longitude:</label>
					<div class="col-sm-10">
					 	{!! Form::text('longitude' , null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Latitude:</label>
					<div class="col-sm-10">
					 	{!! Form::text('latitude' , null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Title:</label>
					<div class="col-sm-10">
					 	{!! Form::text('title' , null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Body:</label>
					<div class="col-sm-10">
					 	{!! Form::textarea('body' , null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Picture:</label>
					<div class="col-sm-10">
					 	{!! Form::file('picture') !!}
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

