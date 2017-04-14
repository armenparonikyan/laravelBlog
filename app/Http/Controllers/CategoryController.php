<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function create(){
		return view('category.create');
	}
	public function store(){
		$this->validate([
			'category' => 'required|max:255'
		]);

		$category = Category::create([
			'name'=>request('category')
		]);
		
		return redirect('/');
	}
}
