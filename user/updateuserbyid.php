<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	$user_id=isset($_GET['id']) ? $_GET['id'] : die();
	$jsonObj = json_decode(file_get_contents("php://input"));
		
	/* $user_mobile = $jsonObj->user_mobile;
	$user_name = $jsonObj->user_name;
	$user_address = $jsonObj->user_address; */
	
	$user_mobile = $_POST['user_mobile'];
	$user_name = $_POST['user_name'];
	$user_address = $_POST['user_address'];
	
	$query="update `user` set `user_mobile`='$user_mobile', `user_name`='$user_name', `user_address`='$user_address' where `user_id`=$user_id";
	$result = mysqli_query($con,$query);

	if ($result){
		$res['Message']='Profile Updated Successfully';
		$res['status']='True';
	}
	else{
		$res['Message']='Profile Not Updated';
		$res['status']='False';
	}
	
	echo json_encode($res);
	mysqli_close($con);
?>
<!-- 
{
	"user_mobile":"123",
	"user_name":"Priyansh_sp",
	"user_address":"Paldi Ahmedabad"
}
-->