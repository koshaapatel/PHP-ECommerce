<?php
	session_start();
	header('Content-Type: application/json');
	$response = new stdClass();
	try {
	
			$db = new PDO('mysql:dbname=ecommerce; host=localhost','root',''); 
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$connected = true;
			$sql = $db->prepare('SELECT * FROM `tab_product`');
            $sql->execute();
            #get the results from sql
            $products = $sql->fetchAll(PDO::FETCH_ASSOC);
					#send the json
					if(sizeof($products)){
						$response->status = true;
						$response->data = $products;
						$response->msg = "Data found for Products";
					}else{
						$response->status = false;
						$response->data = '';
						$response->msg = "Data not found for Products";
						
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
	



?>
