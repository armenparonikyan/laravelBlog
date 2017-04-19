@if(isset($post))
	<?php echo Form::model($post, ['action' => ['PostController@editStore',$post->id]]); ?>
@else
	<?php echo Form::open(['url' => 'posts/create']); ?>
@endif
	<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
		<label for="title">Title</label>
		<?php echo Form::text('title',null, $attributes=['id'=>'title','class' =>'form-control', 'placeholder' => 'Title']);?>
	</div>
	<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
		<label for="body">Body</label>
		<?php echo Form::textarea('body',null, $attributes=['id'=>'body','class' =>'form-control', 'placeholder' => "Your post's body here...", 'rows' => '2']);?>
	</div>
	<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>


{{ Form::close() }}