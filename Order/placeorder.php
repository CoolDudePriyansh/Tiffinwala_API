<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	//$jsonObj = json_decode(file_get_contents("php://input"));
	
	/*$tiffinvo_tiffin_id = $jsonObj->tiffinvo_tiffin_id;
	$uservo_user_id = $jsonObj->uservo_user_id;
	$menuvo_menu_id = $jsonObj->menuvo_menu_id;
	$quantity = $jsonObj->quantity;
	$amount = $jsonObj->amount;
	$user_address = $jsonObj->user_address;*/
	
	$tiffinvo_tiffin_id = $_POST['tiffinvo_tiffin_id'];
	$uservo_user_id = $_POST['uservo_user_id'];
	$menuvo_menu_id = $_POST['menuvo_menu_id'];
	$quantity = $_POST['quantity'];
	$amount = $_POST['amount'];
	$user_address = $_POST['user_address'];
	$date=date("d-m-Y");
	$order_flag=1;
	
	$query="update `user` set `user_address`='$user_address' where `user_id`='$uservo_user_id' and user_flag=3";
	mysqli_query($con,$query);
	
	$query="INSERT INTO `order_item`(`tiffinvo_tiffin_id`, `uservo_user_id` , `menuvo_menu_id` , `quantity` , `amount`, `date`, `order_flag`) VALUES
	($tiffinvo_tiffin_id, $uservo_user_id, $menuvo_menu_id, $quantity, $amount, '$date', $order_flag)";
	
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
    "tiffinvo_tiffin_id":2,
    "uservo_user_id":3,
    "menuvo_menu_id":4,
    "quantity":1,
    "amount":80,
    "user_address":"SP"
}	
-->