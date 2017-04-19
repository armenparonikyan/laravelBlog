<?php 

namespace App\Services;

class CategoryService
{
	public function userCreatedCategory($category)
	{
		return auth()->id() === $category->user->id;
	}
}