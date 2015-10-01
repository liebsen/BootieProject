<?php namespace Controller;

class FileController extends \Controller\BaseController {

	static function upload(){
		if ($_FILES['file']['name']) {
            if (!$_FILES['file']['error']) {
            	$fsy = SP . 'public/upload/' . date('Y');
            	$folder = date('Y').'/'.date('m');
            	$fsx = SP . 'public/upload/' . $folder;
            		
            	if( ! is_dir($fsy)){
            		mkdir($fsy);
            		chmod($fsy,0777);
            	}

            	if( ! is_dir($fsx)){
            		mkdir($fsx);
            		chmod($fsx,0777);
            	}

                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = $fsx . '/' . $filename; //change this directory
                $location = $_FILES["file"]["tmp_name"];

                move_uploaded_file($location, $destination);
                $message =  '/upload/' . $folder . '/' . $filename;//change this URL
            }
            else
            {
              $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
        }

        return $message;
	}


	public function destroy(){

		extract($_POST);

		if(isset($id) && $id){

			$filename = \App\Model\File::row([
				'id' => $id
			])->delete();

			\Bootie\Image::destroy_group($filename);

			return [$result];
		}

		return [
			'error' => "No File ID provided"
		];
	}

	public function order(){

		extract($_POST);

		if($sorted){
			foreach($sorted as $i => $id) {
				$entry = new \App\Model\File();
				$entry->id = $id;
				$entry->position = ($i+1);
				$entry->save();
			}
		}

		return ['ok'];
	}

	static public function resize(){

		$storeFolder = SP . 'public/upload/'.'posts/';

		extract($_POST);

		if ( ! empty($_FILES) ) {

			if( ! is_numeric($post_id)){
				$post = new \App\Model\Post();
				$post->updated = time();
				$post_id = $post->save();
			} 

			$filename = \Bootie\Str::sanitize($_FILES['file']['name'],$storeFolder);
			
			\Bootie\File::writeable($storeFolder);

			if( copy($_FILES['file']['tmp_name'], $storeFolder . $filename)){

				$stat = stat($storeFolder . $filename);

				$entry = new \App\Model\File();
				$entry->name = $filename;
				$entry->post_id = $post_id;
				$entry->file_size = $stat[7];

				$file_id = $entry->save();

				\Bootie\Image::resize_group($storeFolder,$filename);

				return [
					'success' => true, 
					'id' => $file_id, 
					'post_id' => $post_id
				];
			}

			return [
				"error" => "Could not write to fs"
			];
		}
	}	
}