<?php namespace Controller;

class AuthController extends \Controller\BaseController {
	
	static $salt = "qwepoiasdlkj!";

	private function add_session($data){
		$_SESSION['user_id'] = $data->id;
		$_SESSION['username'] = $data->username;
		$_SESSION['group'] = "admin";
		$_SESSION['title'] = $data->title;
		$_SESSION['email'] = $data->email;
		$_SESSION['first_name'] = strpos(trim($data->title),' ') === false ? $data->title : strstr($data->title,' ',true);
	}

	public function register_preview(){

		extract($_REQUEST);

		$id = DB::query("select * from users where email = '" . $email . "'",1);
		$json = "email_not_evailable";

		return array('result'=>$json,'id'=>$id);
	}	

	public function register(){
		$exists = (new Post())
			->where('id','=',1)
			->select('count');

		var_dump($exists);
		extract($_POST);

		$username = strtolower($username);
		$email = strtolower($email);

		
		$exists = (new User())
			->where('username','=',$email)
			->where('email','=',$email,' OR ')
			->select('count');

		var_dump($exists);

		if( $exists ) {
			return array('result'=>_l('Auth_Email_Exists') . ' : ' . $email);
		}


		$json = "error";
		$id = 0;

		if( ! $exists){
			/*
			$id = DB::write("insert into users set 
				title = '" . $title . "',
				email = '" . $email . "',
				pass = '" . sha1($password . self::$salt) . "',
				lang = '" . LOCALE . "', 
				username = '" . $username . "',
				privacy_id = 1,
				created = " . time() 
			);*/


			// $data = DB::query('select * from users where id = ' . $id,1);

			AuthController::add_session($data);

			// sendmail($email,"Tu Blog {$title} ha sido creado",'emails.welcome',$data);

			$json = "ok";
		} 

		return array(
			'result' 	=> 	$json,
			'id'		=>	$id
		);
	}

	public function test_email($segments){	

		$to = "telemagico@gmail.com";
		$title = "This is a test Email (tíldes)";
		$data = array(
			'title' => "My Blog Title tíldes eñes",
			'username' => "myblog",
			'author' => "John Dóe"
		);

		sendmail($to,$title,'emails.welcome',$data);
	}

	public function logout(){
		//AuthController::clear_session();
		foreach($_SESSION as $k=>$v){
			unset($_SESSION[$k]);
		}
		/*
		session_destroy();
		*/
		return redirect("/login","Your session has been successfully closed.");
	}

	public function login(){

		extract($_REQUEST);

		$email = strtolower($email);
		$password = sha1(strtolower($password).self::$salt);
		$json = ['result' => false];

		$user = \Model\User::row([
			"email = '" .  $email . "' AND pass = '" . $password . "' OR username = '" .  $email . "' AND pass = '" . $password . "'"
		]);

		if($user){
			$json['result'] = true;
			$json['redirect'] = "/admin";
			//DB::write('update users set lastlogin = ' . time() . ' where id = ' . $data['id']);
			self::add_session($user);
		} 

		return $json;
	}	

	public function reset_pass(){

		extract($_REQUEST);
		$email = strtolower($email);

		$data = DB::query("select * from users 
			where email = '" . $email . "'  
			or username = '" . $email . "'",1);

		$json = 'Email_Username_Not_Found';

		if($data){
			$json = 'Forgot_Pass_Updated';
			$new_pass = chr( mt_rand( ord( 'a' ) ,ord( 'z' ) ) ) . substr( md5( time( ) ) ,1 );
			$data['new_pass'] = $new_pass;
			DB::write("update users set pass = '" . sha1($new_pass.self::$salt) . "' where id = " . $data['id']);
			sendmail($data['email'], $data['author'] . ", tu contraseña ha sido actualizada",'emails.pass_recovery',$data);
		} 

		return array(
			'result' => $json
		);
	}	
}