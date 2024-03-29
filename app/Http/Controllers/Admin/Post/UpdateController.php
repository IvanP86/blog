<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
    	$data = $request->validated();
        $post = $this->service->update($data, $post);
  //   	$tagIds = $data['tag_ids'];
  //   	unset($data['tag_ids']);
  //   	if( isset($data['preview_image'])){
  //   	$data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
  //   }
  //   	if( isset($data['main_image'])){
  //   	$data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
  //   }
		// // $post = Post::firstOrCreate($data);
  //   	$post->update($data);
		// $post->tags()->sync($tagIds);    	
    	 return view('admin.post.show', compact('post'));
    }
}
