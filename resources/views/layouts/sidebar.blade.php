<div class="sidebar">
	<h1>Categories</h1>
	@foreach($categories as $category)
	<div class="row">
		<div class="col-md-5">
			<h3><a href="/posts/categories/{{$category->name}}">{{$category->name}}</a></h3>
		</div>
		<div class="col-md-7">
			@if (Auth::check() && Auth::user()->id === $category->user->id)
				<a class="btn btn-primary" href="/categories/edit/{{$category->name}}" role="button">Edit</a>
				<a class="btn btn-danger" href="/categories/delete/{{$category->name}}" role="button">Delete</a>
			@endif
		</div>
	</div>
	@endforeach

	@if(Auth::check() && Auth::user()->fbUser && Request::url() ==='http://blog.dev')
		<h1 id="fbFriends">FB friends</h1>
		@if($data)
			<ul>
				@foreach($data->data as $friend)
					<li>{{$friend}}</li>
				@endforeach
			</ul>
		@endif
	@endif
</div>