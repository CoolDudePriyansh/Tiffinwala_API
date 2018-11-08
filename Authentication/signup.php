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

	if (mysqli_num_rows($result)>0) 
		$res['Message']='User Registered Successfully';
	else
		$res['Message']='User Not Registered Successfully';
	
	echo json_encode($res);
	mysqli_close($con);
?>