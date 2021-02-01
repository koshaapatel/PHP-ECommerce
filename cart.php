<?php
session_start();
$response = new stdClass();

try {

    #add product to the cart
  
    #Create connection with database
    $db = new PDO('mysql:dbname=ecommerce; host=localhost', 'root',''); 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connected = true;
    
    #Setting session to false to check anonymous user
    #$_SESSION = false;
    
    $user = isset($_SESSION['login']) ?($_SESSION['username']) : 'anonymous'; 

    $sql = $db->prepare("INSERT INTO `cart` (`product_id`, `quantity`, `username`) VALUES (:product_id, :quantity, :username)");
    $sql->bindParam(':product_id', $_POST['product_id']);
    $sql->bindParam(':quantity', $_POST['product_quantity']);
    $sql->bindParam(':username', $user);
    $db_response = $sql->execute();
       
    if($db_response){
        $response->status = true;
        $response->data = '';
        $response->msg = "Cart has been updated";
    }else{
        $response->status = false;
        $response->data = $db_response;
        $response->msg = "Cart could not be created";
    }
 } catch (PDOException $e) {
    #log the exception to a file on the server side
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