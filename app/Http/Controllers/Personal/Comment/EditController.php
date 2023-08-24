<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;

class EditController extends Controller
{
    public function __invoke(Comment $comment)
    {
    	return view('personal.comment.edit', compact('comment'));
    }
}