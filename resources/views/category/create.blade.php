@extends('layouts.app')

@section('content')
	<div class="container">

		<h1 style="text-align: center;">Create a Category</h1>
		<div class="row">
			<form method="post" action='/categories/create'>
				{{ csrf_field() }}
				<div class="form-group col-md-6 col-sm-6 col-xs-6 col-md-offset-3 col-xs-offset-3 col-sm-offset-3">
					<label for="category">Category</label>
					<input type="text" name="category" id ="category" class="form-control" placeholder="Category">
				</div>
				<div class="form-group col-md-6 col-sm-6 col-xs-6 col-md-offset-3 col-xs-offset-3 col-sm-offset-3">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
@endsection