@if(isset($category))
	{{ Form::model($category, ['action' => ['CategoryController@editStore',$category->id]]) }}
@else
	{{ Form::open(['url' => 'categories/create']) }}
@endif
	<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
		<label for="category">Category</label>
		{{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category', 'id'=>'category']) }}
	</div>
	<div class="form-group col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>

{{ Form::close()}}