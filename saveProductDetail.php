<?php
	session_start();
	header('Content-Type: application/json');
	$response = new stdClass();
	try {
			$db = new PDO('mysql:dbname=ecommerce; host=localhost','root',''); 
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$connected = true;
	
					validate();
                    $data = $_POST['image'];
                    define('UPLOAD_DIR', 'upload/');
                   
                    $split = explode( ';', $data);
                    $type = explode( '/', $split[0])[1]; 
                    $file_name = UPLOAD_DIR.'img-'.time().'.'.$type;
                    file_put_contents( 'upload/image.png', base64_decode($data));
					$sql = $db->prepare("INSERT INTO `tab_product` (`id`, `name`, `description`, `pricing`, `shipping_cost`, `image`) VALUES (NULL, :name, :description, :pricing, :shipping_cost, :image)");
					$sql->bindParam(':name', $_POST['name']);
					$sql->bindParam(':description', $_POST['description']);
                    $sql->bindParam(':pricing', $_POST['pricing']);
					$sql->bindParam(':shipping_cost', $_POST['shipping_cost']);
					$sql->bindParam(':image', $file_name);
                    
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
	
	
	function validate() {
		validate_name();
		validate_description();
		validate_pricing();
		validate_shipping_cost();
		validate_image();
		
	}
	
	
	
	function validate_name(){
		if(!isset($_POST['name'])){
				throw new Exception('Name can not be blank');
		} 
	}
	function validate_description(){
		if(!isset($_POST['description'])){
			throw new Exception('Description can not be blank');
		}
       
	}
	function validate_pricing(){
		if(!isset($_POST['pricing']) ){
			throw new Exception('Pricing can not be blank');
		}else if(!is_numeric($_POST['pricing'])){
			throw new Exception('Invalid Pricing. Enter numeric only');
		}
	}
	function validate_shipping_cost(){
		if(!isset($_POST['shipping_cost']) ){
			throw new Exception('Shipping Cost can not be blank');
		}else if(!is_numeric($_POST['shipping_cost'])){
			throw new Exception('Invalid Shipping Cost. Enter Numeric only');
		}
	}
	function validate_image(){
		if(!isset($_POST['image'])){
			throw new Exception('image can not be blank');
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
