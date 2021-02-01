<?php
session_start();
$response = new stdClass();
try {

    $db = new PDO('mysql:dbname=ecommerce; host=localhost', 'root',''); 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connected = true;

    
    $sql = $db->prepare('SELECT * FROM `orders` inner join `order_details` on `orders`. orderid = order_details.orderid where username = :username');
    $sql->bindParam(':username', $_SESSION['username']);
	$sql->execute();
        
            #TO DO: code to be added to see if order is exist aginst user

    #Create connection with database
    $orders = $sql->fetchAll(PDO::FETCH_ASSOC);

		if(sizeof($orders)){
						
    $sql = $db->prepare("INSERT INTO `comments`(`product_id`, `username`, `rating`, `image`, `comment`) VALUES (:product_id, :username, :rating, :image, :comment)");
    $sql->bindParam(':product_id', $_POST['product_id']);
    $sql->bindParam(':username', $_SESSION['username'] );
    $sql->bindParam(':rating', $_POST['rating']);
    $sql->bindParam(':image', $_POST['image']);
    $sql->bindParam(':comment', $_POST['comment']);
    $db_response = $sql->execute();
    if($db_response){
        $response->status = true;
        $response->data = '';
        $response->msg = "Comment has been posted";
    }else{
        $response->status = false;
        $response->data = $db_response;
        $response->msg = "Comment could not be posted";
    } }else{
        $response->status = false;
        $response->data = $orders;
        $response->msg = "no order found for this item";
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