@extends('layouts.app')

@section('content')
	<h1 style="text-align: center;">Edit a Post</h1>
	<div class="row">
		@include('post.form')
	</div>
@endsection