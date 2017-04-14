@extends('layouts.app')

@section('content')
	<div class="container">

		<h1 style="text-align: center;">Create a Post</h1>
		<div class="row">
			<form method="post" action='/posts/create'>
				{{ csrf_field() }}
				<div class="form-group col-md-6 col-sm-6 col-xs-6 col-md-offset-3 col-xs-offset-3 col-sm-offset-3">
					<label for="title">Title</label>
					<input type="text" name="title" id ="title" class="form-control" placeholder="Title">
				</div>
				<div class="form-group col-md-6 col-sm-6 col-xs-6 col-md-offset-3 col-xs-offset-3 col-sm-offset-3">
					<label for="body">Body</label>
					<textarea  name="body" id ="body" class="form-control"  rows="3" placeholder="Your post's body here..."></textarea>
				</div>
				<div class="form-group col-md-6 col-sm-6 col-xs-6 col-md-offset-3 col-xs-offset-3 col-sm-offset-3">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
		
	</div>
@endsection