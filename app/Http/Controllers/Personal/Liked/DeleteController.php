<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
    	auth()->user()->likedPosts()->detach($post->id);
    	return redirect()->route('personal.liked.index');
    }
}
