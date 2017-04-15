@extends('layouts.app')

@section('content')
	<h1 style="text-align: center;">Edit a Category</h1>
	<div class="row">
		<form method="post" action='/categories/edit/{{$category->id}}'>
			{{ csrf_field() }}
			<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
				<label for="name">Category name</label>
				<input type="text" name="name" id ="name" class="form-control" value="{{$category->name}}">
			</div>
			<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
@endsection