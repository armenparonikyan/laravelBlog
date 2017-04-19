<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
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
	public function store(CategoryRequest $request)
	{

		Category::create([
			'name'=> $request->name,
			'user_id' => auth()->id()
		]);
		
		return redirect('/');
	}
	public function edit(Category $category, CategoryService $service)
	{
		if (!$service->userCreatedCategory($category)) {
			return redirect('/');
		}
		return view('category.edit', compact('category'));
	}
	public function editStore($id, CategoryRequest $request)
	{
		Category::find($id)->update([
			'name' => $request->name
		]);

		return redirect('/');
	}
	public function delete(Category $category, CategoryService $service)
	{
		if ($service->userCreatedCategory($category)) {
			$category->delete();
		}
		return redirect('/');
	}
}
