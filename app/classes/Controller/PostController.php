<?php namespace Controller;

class PostController extends \Controller\BaseController {
	
	static $layout = "admin";

	public function index(){

		$entries = \Model\Post::paginate([
			'updated' => "DESC"
		],null,10);

		return \Bootie\App::view('admin.posts.index',[
			'entries'	=> $entries
		]);
	}

	public function create(){

		$p = new \Model\Post();
		$p->title = 'New Post';
		$p->user_id = session('user_id');
		$p->created = TIME;
		$p->updated = TIME;
		$p->save();
		$id = $p->id;

		$entry = \Model\Post::row([
			'id' => $id
		]);
		
		return \Bootie\App::view('admin.posts.edit',[
			'entry'	=> $entry
		]);
	}

	public function edit($id){

		if(is_numeric($id))
		{
			$entry = \Model\Post::row([
				'id' => $id
			]);
			
			return \Bootie\App::view('admin.posts.edit',[
				'entry'	=> $entry
			]);
		}
		
		return \Exception('Post ID was not provided');
	}

	public function update($id){

		if(is_numeric($id))
		{

			extract($_POST);

			$entry = new \Model\Post();
			$entry->id = $id;
			$entry->title = $title;
			$entry->slug = ! empty($slug) ? $slug : sanitize($title,false);
			$entry->caption = $caption;
			$entry->content = $content;
			$entry->updated = TIME;
			$result = $entry->save();

			return redirect('/admin/posts',[
				'success' => "Entry <strong>{$entry->title}</strong> has been updated"
			]);
		}

		return redirect('/admin/posts',[
			'danger' => "Entry ID was not provided"
		]);
	}

	public function delete($id){

		if(is_numeric($id))
		{
			$entry = \Model\Post::row([
				'id' => $id
			]);

			if( $entry )
			{

				$tags = \Model\PostTag::row([
					'post_id' => $id
				]);

				if($tags)
				{
					$tags->delete();
				}

				foreach($entry->files() as $file)
				{
					\Bootie\Image::destroy_group($file->name,'posts');

					\Model\File::row([
						'id' => $file->id
					])->delete();
				}

				$title = $entry->title;
				$entry->delete();

				return redirect('/admin/posts',[
					'success' => "Entry <strong>{$title}</strong> has been deleted"
				]);
			}
		}

		return redirect('/admin/posts',[
			'danger' => "Entry was not found"
		]);
	}
}