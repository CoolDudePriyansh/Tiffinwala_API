<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	$jsonObj = json_decode(file_get_contents("php://input"));
		
	$user_address = $jsonObj->user_address;
	$user_email = $jsonObj->user_email;
	$user_flag = $jsonObj->user_flag;
	$user_mobile = $jsonObj->user_mobile;
	$user_name = $jsonObj->user_name;
	$user_password = $jsonObj->user_password;
	$fk_city_id = $jsonObj->fk_city_id;
	
	
	$query="INSERT INTO `user`(`user_address`, `user_email`, `user_flag` , `user_mobile` , `user_name` , `user_password` , `fk_city_id`) VALUES 
	('$user_address','$user_email',$user_flag,'$user_mobile','$user_name','$user_password',$fk_city_id)";
	
	$result = mysqli_query($con,$query);

	if($result) 
		$res['Message']='Data Inserted Successfully';
	else
		$res['Message']='Data Not Inserted';
	
	echo json_encode($res);
	mysqli_close($con);
?>