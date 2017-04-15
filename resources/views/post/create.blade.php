@extends('layouts.app')

@section('content')
		<h1 style="text-align: center;">Create a Post</h1>
		<div class="row">
			<form method="post" action='/posts/create'>
				{{ csrf_field() }}
				<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
					<label for="title">Title</label>
					<input type="text" name="title" id ="title" class="form-control" placeholder="Title">
				</div>
				<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
					<label for="body">Body</label>
					<textarea  name="body" id ="body" class="form-control"  rows="2" placeholder="Your post's body here..."></textarea>
				</div>
				<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
@endsection