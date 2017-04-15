@extends('layouts.app')

@section('content')

	<h1 style="text-align: center;">Create a Category</h1>
	<div class="row">
		<form method="post" action='/categories/create'>
			{{ csrf_field() }}
			<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
				<label for="category">Category</label>
				<input type="text" name="category" id ="category" class="form-control" placeholder="Category">
			</div>
			<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
@endsection