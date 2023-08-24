<?php

namespace App\Service;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class PostService
{
  public function store($data)
  {
	try{
		Db::beginTransaction();
		if(isset($data['tag_ids'])){
	    	$tagIds = $data['tag_ids'];
	    	unset($data['tag_ids']);
		}
	    $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
	    $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
		$post = Post::firstOrCreate($data);
		if(isset($tagIds)){
			$post->tags()->attach($tagIds);
		}
		DB::commit();
    } catch(\Exception $exception){
    	DB::rollback();
    	abort(404);
    }
  }

  public function update($data, $post)
  {
  	try{
  		Db::beginTransaction();
		if(isset($data['tag_ids'])){
	    	$tagIds = $data['tag_ids'];
	    	unset($data['tag_ids']);
		}
	    if( isset($data['preview_image'])){
	    	$data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
	    }
	    if( isset($data['main_image'])){
	    	$data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
	    }
			// $post = Post::firstOrCreate($data);
	    $post->update($data);
	    if(isset($tagIds)){
			$post->tags()->sync($tagIds);
		}
		DB::commit();
	} catch(Exception $exception){
		DB::rollback();
		abort(500);
	}
	return $post;
  }
}