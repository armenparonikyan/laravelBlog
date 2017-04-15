<?php

namespace App;


class Category extends Model
{
	public function posts(){
		return $this->belongsToMany(Post::class);
	}
	public function user(){
		return $this->belongsTo(User::class);
	}
	public function getRouteKeyName(){
		return 'name';
	}
}
