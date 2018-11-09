<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	$jsonObj = json_decode(file_get_contents("php://input"));
		
	$image = $jsonObj->image;	
	$user_email = $jsonObj->user_email;
	$user_flag = $jsonObj->user_flag;
	$user_mobile = $jsonObj->user_mobile;
	$user_name = $jsonObj->user_name;
	$user_password = $jsonObj->user_password;
	
	$query="INSERT INTO `user`(`image`, `user_email`, `user_flag` , `user_mobile` , `user_name` , `user_password`) VALUES ('$image', '$user_email', $user_flag, '$user_mobile', '$user_name', '$user_password')";
	
	$result = mysqli_query($con,$query);

	if($result) 
		$res['Message']='User Registered Successfully';
	else
		$res['Message']='User Not Registered Successfully';
	
	echo json_encode($res);
	mysqli_close($con);
?>
<!--
{
	"image":"SP",
	"user_email":"sp@gmail.com",
	"user_flag":"1",
	"user_mobile":"123",
	"user_name":"sp",
	"user_password":"12"
} 
-->