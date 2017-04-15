<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

	public function __construct(){
		$this->middleware('auth')->except(['index','show']);
	}
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();
    	return view('index', compact('posts'));
    }

    public function create(){
    	return view('post.create');
    }
    public function store(){
    	$this->validate(request(), [
    		'title' => 'required|min:5|max:255',
    		'body' => 'required'
     	]);

        Post::create([
            'title'=>request('title'),
            'body'=>request('body'),
            'user_id'  => auth()->id()
        ]);

        return redirect('/');
    }

    public function edit(Post $post){
        if(auth()->id() !== $post->user->id){
            return redirect('/');
        }
        return view('post.edit', compact('post'));
    }
    public function editStore(Post $post){
       $post->update([
            'title' => request('title'),
            'body' => request('body')
        ]); 
       return redirect('/');
    }
    public function delete(Post $post){
        if(auth()->id() === $post->user->id){
            $post->delete();
        }
        return redirect('/');
    }
    public function show(Post $post){
        $categories = Category::all()->diff($post->categories);
        return view('post.show', compact(['post', 'categories']));
    }
    public function add(Post $post, Category $category){
        if(auth()->id() === $post->user->id){
            $post->categories()->attach($category);
        }
        return back();
    }
}
