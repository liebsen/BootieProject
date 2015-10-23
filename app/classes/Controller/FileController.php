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

		if( is_numeric($id) ){

			$file = \Model\File::row([
				'id' => $id
			]);

			if( $file )
			{
				\Bootie\Image::destroy_group($file->name,'posts');
				$file->delete();
			}

			return ['ok'];
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

		extract($_POST);

		if ( ! empty($_FILES) ) {

			$mainFolder = SP . 'public/upload/';
	
			directory_is_writable($mainFolder,0777);

			$storeFolder =  $mainFolder . $domain;
			$filename = filename_unique($storeFolder. '/' . key(config()->img_sizes) . '/',$_FILES['file']['name']);
			
			directory_is_writable($storeFolder,0777);

			$orig_filename = $storeFolder . $filename;

			if( copy($_FILES['file']['tmp_name'], $orig_filename)){

				$stat = stat($orig_filename);

				$entry = new \Model\File();
				$entry->name = $filename;
				$entry->post_id = $post_id;
				$entry->file_size = $stat[7];
				$entry->created = TIME;
				$entry->updated = TIME;

				$file_id = $entry->save();

				\Bootie\Image::resize_group($orig_filename,$storeFolder,$filename, config()->img_sizes);

				if( config()->img_save_orig)
				{
					directory_is_writable($storeFolder. '/orig/',0777);
					copy($orig_filename, $storeFolder . '/orig/' . $filename);
					unlink($orig_filename);
				}

				return [
					'success' => true, 
					'id' => $file_id, 
					'post_id' => $post_id
				];
			}

			throw new \Exception('Could not write to directory:' . $storeFolder );
		}
	}
}