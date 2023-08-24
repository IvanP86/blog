<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
    	$posts = auth()->user()->likedPosts;
    	return view('personal.liked.index', compact('posts'));
    }
}
