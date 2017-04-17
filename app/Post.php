<?php

namespace App;

use App\Category;
use App\User;

class Post extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }
}
