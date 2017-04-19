<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index(Category $category)
	{
		$posts = $category->posts;
		return view('index', compact('posts'));
	}
	public function create()
	{
		return view('category.create');
	}
	public function store()
	{
		$this->validate(request(),[
			'category' => 'required|max:255'
		]);

		Category::create([
			'name'=>request('category'),
			'user_id' => auth()->id()
		]);
		
		return redirect('/');
	}
	public function edit(Category $category)
	{
		if (auth()->id() !== $category->user->id) {
			return redirect('/');
		}
		return view('category.edit', compact('category'));
	}
	public function editStore($id)
	{
		$this->validate(request(),[
			'name' => 'required|max:255'
		]);

		Category::find($id)->update([
			'name' => request('name')
		]);

		return redirect('/');
	}
	public function delete(Category $category)
	{
		if (auth()->id() === $category->user->id) {
			$category->delete();
		}
		return redirect('/');
	}
}
