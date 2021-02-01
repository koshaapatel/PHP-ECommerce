<?php
	session_start();
	header('Content-Type: application/json');
	$response = new stdClass();
	try {
			$db = new PDO('mysql:dbname=ecommerce; host=localhost','root',''); 
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$connected = true;
			
		
					validate($db,$_POST['username']);
					check_user_exists($db,$_POST['username']);
					$sql = $db->prepare("INSERT INTO `tab_user` (`email`, `username`, `password`, `add_line_1`, `add_line_2`, `city`, `state`, `country`) VALUES (:email, :username, :password, :add_line_1, :add_line_2, :city, :state, :country)");
					$sql->bindParam(':email', $_POST['email']);
					$sql->bindParam(':username', $_POST['username']);
					$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$hash = substr( $hash, 0, 60 );
					$sql->bindParam(':password', $hash);
					$sql->bindParam(':add_line_1', $_POST['add_line_1']);
					$sql->bindParam(':add_line_2', $_POST['add_line_2']);
					$sql->bindParam(':city', $_POST['city']);
					$sql->bindParam(':state', $_POST['state']);
					$sql->bindParam(':country', $_POST['country']);
					$db_response = $sql->execute();
					#get the results from sql
					#send the json
					if($db_response){
						$response->status = true;
						$response->data = '';
						$response->msg = "Data inserted successfully";
					}else{
						$response->status = false;
						$response->data = $db_response;
						$response->msg = "Data insertion failed";
					}
				// The request is using the POST method
			

		
		
	}
	catch(PDOException $e) {
			$response->status = false;
			$response->data = "";
			$response->msg = $e->getMessage();
			#log the exception to a file on the server side
			
	}
	catch(Exception $e) {
			$response->status = false;
			$response->data = "";
			$response->msg = $e->getMessage();
			#log the exception to a file on the server side
			
	}
	finally {
		echo json_encode($response);
	}
	
	
	function validate($db,$username) {
		validate_email();
		validate_username();
		validate_add_line_1();
		validate_add_line_2();
		validate_city();
		validate_state();
		validate_country();
		
		
	}
	
	function validate_email(){
		if(!isset($_POST['email'])){
				throw new Exception('Email can not be blank');
		}else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			throw new Exception('Invalid Email');
		}
	}
	
	function validate_username(){
		if(!isset($_POST['username'])){
				throw new Exception('Username can not be blank');
		}else{
			
		}
	}
	function validate_add_line_1(){
		if(!isset($_POST['add_line_1'])){
			throw new Exception('Address Line 1 can not be blank');
		}else{
			
		}
	}
	function validate_add_line_2(){
		if(!validate_string($_POST['add_line_2'])){
			throw new Exception('Invalid Address Line 2. Enter string only.');
		}else{
			
		}
	}
	function validate_city(){
		if(!isset($_POST['city'])){
			throw new Exception('City can not be blank');
		}else if(!validate_string($_POST['city'])){
			throw new Exception('Invalid City. Enter string only');
		}
	}
	function validate_state(){
		if(!isset($_POST['state'])){
			throw new Exception('State can not be blank');
		}else if(!validate_string($_POST['state'])){
			throw new Exception('Invalid state. Enter string only');
		}
	}
	function validate_country(){
		if(!isset($_POST['country'])){
				throw new Exception('State can not be blank');
		}else if(!validate_string($_POST['country'])){
			throw new Exception('Invalid country. Enter string only');
		}
	} 
	
	function get_records($db,$username){
		$sql = $db->prepare('SELECT * FROM `tab_user` where username = :username');
		//$_SESSION['username'] = "koshapatel1045";
		
		$sql->bindParam(':username', $username);
		$sql->execute();
		#get the results from sql
		$users = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $users;
		
	}
	
	function check_user_exists($db,$username){
		$users = get_records($db, $username);
		if(sizeof($users)){
			throw new Exception('User Exists');
		}
	}
	
	function validate_string($input){
		if (!preg_match("/^\d+$/", $input)) {
			return true;
		} else {
			return false;
		}
	}

?>
