<?php

namespace App\Services;

use App\Post;

class PostService
{
	public function userCreatedPost(Post $post)
	{
		return auth()->id() === $post->user->id;
	}
	public function checkAndUpdateImage($image){
        if ($image->isValid()) {
            $path = $image->store('img');
        }
        $filename = '/storage/img/'.basename($path);
        if (auth()->user()->img !== '/storage/img/blank-pic.png') {
            Storage::delete('img/' . auth()->user()->img);
        }
        auth()->user()->update(['img' => $filename]);
	}
}