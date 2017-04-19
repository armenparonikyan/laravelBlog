@extends('layouts.app')

@section('content')

	<h1 style="text-align: center;">Create a Category</h1>
	<div class="row">
		@include('category.form')
	</div>
@endsection