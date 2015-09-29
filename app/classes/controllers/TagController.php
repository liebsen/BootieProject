<?php namespace App\Controllers;

require SP . 'app/models/Tag.php';
require SP . 'app/models/PostTag.php';

class TagController {
	
	static $layout = "admin";

	public function tags($path,$post_id){

		$tags_ids = $included = $excluded = [];
		$user_id = session('user_id');

		if(isset($post_id) && $post_id){
			$tags_ids = \App\Models\PostTag::select('fetch','tag_id',null,[
				'post_id' => $post_id
			]);
		}

		if( ! count($tags_ids)){
			$tags_ids = [0];
		}

		$included = \App\Models\Tag::select('fetch','tag',null,[
			'id IN(' . implode(',',$tags_ids) . ')',
			'user_id' => $user_id 
		]);

		$excluded = \App\Models\Tag::select('fetch','tag',null,[
			'id NOT IN(' . implode(',',$tags_ids) . ')',
			'user_id' => $user_id
		]);	
			
		return [
			'included' => $included,
			'excluded' => $excluded
		];
	}

	public function add_relation($path,$post_id){

		extract($_POST);
		$included = [];

		if(isset($tags)){

			$user_id = session('user_id');
			
			foreach( $tags as $tag ){

				$tag_id = \App\Models\Tag::select('column','id',null,[
					'tag' => $tag,
					'user_id' => session('user_id')
				]);

				if( ! $tag_id ){
					$tag2 = new \App\Models\Tag();
					$tag2->tag = $tag;
					$tag2->user_id = $user_id;
					$tag2->save();

					$tag_id = $tag2->id;
				}

				$post_tag = new \App\Models\PostTag();
				$post_tag->tag_id = $tag_id;
				$post_tag->post_id = $post_id;
				$post_tag->save();

				$included[] = $tag;
			}
		}

		return [
			'included' => $included
		];
	}

	public function remove_relation($path,$post_id){

		extract($_POST);
		$excluded = [];

		if(isset($tags)){
			
			$user_id = session('user_id');

			foreach( $tags as $tag ){

				$tag_id = \App\Models\Tag::select('column','id',null,[
					'tag' => $tag,
					'user_id' => session('user_id')
				]);

				$post_tags_ids = \App\Models\PostTag::select('fetch','id',null,[
					'tag_id' => $tag_id
				]);

				foreach($post_tags_ids as $id){
					$o = \App\Models\PostTag::row([
						'id' => $id
					])->delete();
				}

				$excluded[] = $tag;
			}
		}

		return [
			'excluded' => $excluded
		];
	}	
}