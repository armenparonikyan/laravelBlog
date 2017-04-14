@foreach($posts as $post)
<div class="post">
	<div class="row">
		<div class="col-md-6 post_left">{{$post->title}}</div>
		<div class="col-md-6 post_right">
			@if(Auth::check() && Auth::user()->id === $post->user->id)
				<a class="btn btn-primary" href="/posts/edit/{{$post->id}}" role="button">Edit</a>
				<a class="btn btn-danger" href="/posts/delete/{{$post->id}}" role="button">Delete</a>
			@endif
		</div>
	</div>


	<h4>Created By {{ $post->user->name}} on {{$post->created_at->toFormattedDateString()}}</h4>
	<div>
		{{$post->body}}
	</div>
</div>
{{-- <hr> --}}
@endforeach