<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	$jsonObj = json_decode(file_get_contents("php://input"));
	
	$address = $jsonObj->address;	
	$fk_tiffin_id = $jsonObj->fk_tiffin_id;
	$fk_user_id = $jsonObj->fk_user_id;
	$fk_menu_id = $jsonObj->fk_menu_id;
	$quantity = $jsonObj->quantity;
	$amount = $jsonObj->amount;
	$date="08-11-2018";
	$order_flag=1;
	
	$query="INSERT INTO `order`(`address`, `fk_tiffin_id`, `fk_user_id` , `fk_menu_id` , `quantity` , `amount` , `date`,`order_flag`) VALUES
	('$address', $fk_tiffin_id, $fk_user_id, $fk_menu_id, $quantity, $amount, '$date', $order_flag)";
	
	$result = mysqli_query($con,$query);

	if ($result)
		$res['Message']='Data Inserted Successfully Added in Order';
	else
		$res['Message']='Data Not Inserted in Order';
	
	echo json_encode($res);
	mysqli_close($con);
?>