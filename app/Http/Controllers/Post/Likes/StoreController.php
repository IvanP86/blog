<?php

namespace App\Http\Controllers\Post\Likes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Http\Requests\Post\Comment\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
    	auth()->user()->likedPosts()->toggle($post->id);
    	return redirect()->back();
    }
}
