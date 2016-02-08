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
					<label class="control-label col-sm-2">Location Category:</label>
					<div class="col-sm-10">
					 	{!! Form::text('location_category' , null , ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Colour:</label>
					<div class="col-sm-10">
					 	{!! Form::text('colour' , empty($model->id) ? 'FF0000' : null , ['class' => 'form-control' , 'id' => 'colour' ,'readonly']) !!}
						<br/>
						<div id = 'colours'></div>
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

@section('script')
	
	<script type="text/javascript">

	$(document).ready(function(){

		$('#colours').ColorPicker({
			color: '{{ empty($model->colour) ? "#FF0000" : $model->colour }}',
			flat: true,
			onChange : function(hsb, hex, rgb)
			{
				$("#colour").val("#" + hex);
			}
		});
		
		
	});

	</script>
	
@endsection

