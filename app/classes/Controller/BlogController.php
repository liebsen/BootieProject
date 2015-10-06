<?php namespace Controller;

class BlogController extends \Controller\BaseController  {

	static $layout = "default";
		
	public function index(){
		return \Bootie\App::view('blog.index',[
			'posts'	=> \Model\Post::paginate(['id' => 'DESC'],null,6),
			'tags'	=> self::find_all_tags(),
		]);
	}

	public function tag($tag){
		return \Bootie\App::view('blog.tags',[
			'posts'	=> self::find_by_tag($tag),
			'tags'	=> self::find_all_tags(),
			'tag'	=> $tag
		]);
	}

	public function show($slug){

		$tags_ids = [];

		$entry = \Model\Post::row([
			'slug' => urldecode($slug)
		]);

		if($entry) {

			$meta = new \stdClass();
			$meta->og_title = $entry->title;
			$meta->og_description = $entry->caption;
			$posts_ids = $related = [];

			foreach($entry->tags() as $tag){
				if( isset($tag->id)){
					$tags_ids[] = $tag->id;
				}
			}

			if(count($entry->files())){
				$meta->og_image = site_url('upload/posts/std/' . $entry->files()[0]->name);
			}

			if(count($tags_ids)){
				$tag_obs = \Model\PostTag::fetch([
					'tag_id IN(' . implode(',',array_unique($tags_ids)) . ')'
				]);

				foreach($tag_obs as $tag){
					if($tag->post_id == $entry->id) continue;
					$posts_ids[] = $tag->post_id;
				}

				if(count($posts_ids)){
					$related = \Model\Post::fetch([
						'id IN(' . implode(',',array_unique($posts_ids)) . ')'
					]);
				}
			}

			return \Bootie\App::view('blog.entry',[
				'entry'	=> $entry,
				'meta'	=> $meta,
				'related' => $related
			]);
		} 

		return \Bootie\App::view('errors.missing');
	}

	public function files($id){
		$files = [];

		if($id){
			$files = \Model\File::select('fetch','*',null,[
				'post_id' => $id
			]);
		}

		return $files;
	}

	public function find_by_tag($tag){

		$tag_id = \Model\Tag::column([
			'tag' => $tag
		]);

		if(is_numeric($tag_id)){

			$posts_ids = \Model\PostTag::select('fetch','post_id',null,[
				'tag_id' => $tag_id
			]);

			if(count($posts_ids)){
				$posts = \Model\Post::paginate([
					'id' => 'DESC'
				],[
					'id IN(' . implode(',',array_unique($posts_ids)) . ')'
				],6);
			}

			return $posts;
		}

		return FALSE;

	}

	public function find_all_tags(){

		$posts_ids = \Model\Post::select('fetch','id');

		if(count($posts_ids)){

			$tags_ids = \Model\PostTag::select('fetch','tag_id',null,[
				'post_id IN(' . implode(',',$posts_ids) . ')'
			]);

			if(count($tags_ids)){
				return \Model\Tag::fetch([
					'id IN(' . implode(',',array_unique($tags_ids)) . ')'
				]);
			}
		}

		return FALSE;
	}
}