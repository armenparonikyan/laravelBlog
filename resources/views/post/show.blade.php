@extends('layouts.app')

@section('content')
	<h1>{{$post->title}}</h1>
	@if(count($post->categories) > 0)
		<h4>Post categories</h4>
		<ul>
			@foreach($post->categories as $category)
				<li><a href="/posts/categories/{{$category->name}}">{{$category->name}}</a></li>
			@endforeach
		</ul>
	@endif	
	<div>
		{{ $post->body}}
	</div>
	@if(Auth::check() && Auth::user()->id === $post->user->id)
		<p class="addCategory">
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#categories" aria-expanded="false" aria-controls="categories">
		    	Add a Category
			</button>
		</p>

		<div class="collapse" id="categories">
			<div class="list-group">
			@foreach($categories as $category)
				<a class="list-group-item list-group-item-action" href="/posts/add/{{$post->id}}/{{$category->name}}">{{$category->name}}</a>
			@endforeach
			</div>
		</div>
	@endif	
@endsection