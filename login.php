<?php
	session_start();
	header('Content-Type: application/json');
	$response = new stdClass();
	try {
			$db = new PDO('mysql:dbname=ecommerce; host=localhost','root',''); 
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$connected = true;
			
		
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				
					$sql = $db->prepare('SELECT * FROM `tab_user` where username = :username');
					//$_SESSION['username'] = "koshapatel1045";
					$sql->bindParam(':username', $_POST['username']);
					$sql->execute();
					#get the results from sql
					$users = $sql->fetchAll(PDO::FETCH_ASSOC);
					#send the json

					if(sizeof($users)){
						
						if (password_verify($_POST['password'], $users[0]['password'])) {
							$_SESSION['login'] = true;
							$_SESSION['username'] = $_POST['username'];
							$_SESSION['uid'] = $users[0]['id'];
							$response->status = true;
							$response->data = '';
							$response->msg = "Login Successfully";
						}
						else {
							http_response_code(401);
							$response->status = false;
							$response->data = '';
							$response->msg = "Login Failed";

						}
					}else{
						http_response_code(401);
						$response->status = false;
						$response->data = '';
						$response->msg = "Login Failed";
						
					}
				// The request is using the POST method
			
		   
			}else {
				$response->status = false;
				$response->data = '';
				$response->msg = "Unsupported method, You must use POST";
			}
			
	
		
	}
	catch(PDOException $e) {
			$response->status = false;
			$response->e = $e->getTraceAsString();;
			$response->data = "";
			$response->msg = "Problem with Database Connection";
			#log the exception to a file on the server side
			
	}
	catch(Exception $e) {
			$response->status = false;
			$response->error = $e->getTraceAsString();
			$response->data = "";
			$response->msg = "Error occured";
			#log the exception to a file on the server side
			
	}
	finally {
		echo json_encode($response);
	}
?>
