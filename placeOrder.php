<?php
session_start();
$response = new stdClass();
try{
    #Create connection with database
    $db = new PDO('mysql:dbname=ecommerce; host=localhost', 'root',''); 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connected = true;
    
    $user = isset($_SESSION['login']) ?($_SESSION['username']) : 'anonymous'; 
    
    $sql = $db->prepare("INSERT INTO `orders`(`username`, `product_quantity`, `total_price`, `shipping_address`) 
    VALUES (:username, :product_quantity, :total_price ,:shipping_address)");
    $sql->bindParam(':username', $user);
    $sql->bindParam(':product_quantity', $_POST['product_quantity']);
    $sql->bindParam(':total_price', $_POST['total_price']);
    $sql->bindParam(':shipping_address', $_POST['shipping_address']);
    $db_response = $sql->execute();
    if( isset($_POST['product_quantity']) && $_POST['product_quantity'] >= 1 ) {
    $sql = $db->prepare ("INSERT INTO `order_details` (`orderid`, `product_id`, `product_quantity`, `shipping_cost`, `total_price`) VALUES (:orderid, :product_id, :product_quantity, :shipping_cost, :total_price)");
    $id =$db->lastInsertId();
        
    $sql->bindParam(':orderid',$id );
    $sql->bindParam(':product_id', $_POST['product_id']);
    $sql->bindParam(':product_quantity', $_POST['product_quantity']);
    $sql->bindParam(':shipping_cost', $_POST['shipping_cost']);
    $sql->bindParam(':total_price', $_POST['total_price']);
    $db_response = $sql->execute();
    } else {
    }   
    if($db_response){
        $response->status = true;
        $response->data = "";
        $response->msg = "Order has been updated";
    }else{
        $response->status = false;
        $response->data = $db_response;
        $response->msg = "Order could not be created";
    }
    
    } catch(PDOException $e) {
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