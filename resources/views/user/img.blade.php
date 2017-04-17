@extends('layouts.app')

@section('content')
	<h1 style="text-align: center;">Upload an Image</h1>
	<form action="/user/img/store" method="POST" enctype="multipart/form-data">
		{{ csrf_field()}}
		<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
			<label for="photo">File input</label>
			<input type="file" name="photo" id="photo" accept="image/*">
		</div>
		<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
			<input type="submit" class="btn btn-primary">
		</div>
	</form>
@endsection