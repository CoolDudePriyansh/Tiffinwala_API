<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	$jsonObj = json_decode(file_get_contents("php://input"));
	
	$fk_tiffin_id = $jsonObj->fk_tiffin_id;
	$fk_user_id = $jsonObj->fk_user_id;
	$fk_menu_id = $jsonObj->fk_menu_id;
	$quantity = $jsonObj->quantity;
	$amount = $jsonObj->amount;
	$user_address = $jsonObj->user_address;
	$date="08-11-2018";
	$order_flag=1;
	
	$query="update `user` set `user_address`='$user_address' where `user_id`='$fk_user_id'";
	mysqli_query($con,$query);
	
	$query="INSERT INTO `order`(`fk_tiffin_id`, `fk_user_id` , `fk_menu_id` , `quantity` , `amount` , `date`,`order_flag`) VALUES
	($fk_tiffin_id, $fk_user_id, $fk_menu_id, $quantity, $amount, '$date', $order_flag)";
	
	$result = mysqli_query($con,$query);

	if ($result){
		$res['Message']='Data Inserted Successfully Added in Order';
		$res['status']='True';
	}
	
	else{
		$res['Message']='Data Not Inserted in Order';
		$res['status']='False';
	}
	echo json_encode($res);
	mysqli_close($con);
?>
<!-- 
{
    "fk_tiffin_id":2,
    "fk_user_id":3,
    "fk_menu_id":4,
    "quantity":1,
    "amount":80,
    "user_address":"SP"
}	
-->