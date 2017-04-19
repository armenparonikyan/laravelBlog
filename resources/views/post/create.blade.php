@extends('layouts.app')

@section('content')
		<h1 style="text-align: center;">Create a Post</h1>
		<div class="row">
			@include('post.form')
		</div>
@endsection