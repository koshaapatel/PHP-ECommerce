<?php
	session_start();
	header('Content-Type: application/json');
	$response = new stdClass();
	try {
		if( isset($_SESSION['login']) and isset($_SESSION['username'])){
			
			$db = new PDO('mysql:dbname=ecommerce; host=localhost','root',''); 
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$connected = true;
			
		
					#create and execute the sql statement
					$users = get_records($db,$_SESSION['username']);
					#send the json
					if(sizeof($users)){
						$response->status = true;
						$response->data = $users[0];
						$response->msg = "Data found for user";
					}else{
						$response->status = false;
						$response->data = '';
						$response->msg = "Data not found for user";
						
					}
					
					
			
					#return an empty array if we could not talk to the database
					#$response->status = false;
					#$response->data = ""
					#$response->msg = "No Data found for User";
			
			
			
		}else{
			$response->status = false;
			$response->data = '';
			$response->msg = "Authentication Failure";
			
		}
		
		
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
	
	
	
	function get_records($db,$username){
		$sql = $db->prepare('SELECT * FROM `tab_user` where username = :username');
		//$_SESSION['username'] = "koshapatel1045";
		
		$sql->bindParam(':username', $username);
		$sql->execute();
		#get the results from sql
		$users = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $users;
		
	}


?>
