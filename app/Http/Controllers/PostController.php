<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    public function index()
    {
        $data = request()->data;

        $posts = Post::orderBy('created_at', 'desc')->get();

    	return view('index', compact(['posts','data']));
    }

    public function create()
    {
    	return view('post.create');
    }
    
    public function store(PostRequest $request)
    {

        Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'  => auth()->id()
        ]);

        return redirect('/');
    }

    public function edit(Post $post, PostService $service)
    {
        if (!$service->userCreatedPost($post)) {
            return redirect('/');
        }
        return view('post.edit', compact('post'));
    }
    public function editStore(PostRequest $request, Post $post)
    {
       $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]); 
       return redirect('/');
    }
    public function delete(Post $post,PostService $service)
    {
        if ($service->userCreatedPost($post)) {
            $post->delete();
        }
        return redirect('/');
    }
    public function show(Post $post)
    {
        $categories = Category::all()->diff($post->categories);
        return view('post.show', compact(['post', 'categories']));
    }
    public function add(Post $post, Category $category, PostService $service)
    {
        if ($service->userCreatedPost($post)) {
            $post->categories()->attach($category);
        }
        return back();
    }

    public function imgUpload()
    {
        return view('user.img');
    }
    public function imgStore(Request $request, PostService $service)
    {
        $service->checkAndUpdateImage($request->photo);
        return redirect('/');
    }
}
