<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	$user_id=isset($_GET['id']) ? $_GET['id'] : die();
	$jsonObj = json_decode(file_get_contents("php://input"));
	
	/* $old_password = $jsonObj->old_password;
	$new_password = $jsonObj->new_password;	*/
	
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	
	$query="SELECT * from user where `user_password`='$old_password' and `user_id`=$user_id";
	$result = mysqli_query($con,$query);
	
	if (mysqli_num_rows($result)>0) {
		$query="update `user` set `user_password`='$new_password' where `user_id`=$user_id";
		
		$result = mysqli_query($con,$query);

		if ($result){
			$res['Message']='Your Password is changed Successfully';
			$res['status']='True';
		}
		else {
			$res['Message']='Something went Wrong';
			$res['status']='False';
		}
	}
	else{
		$res['Message']='Old Password is Wrong or No Matching Record Found';
		$res['status']='False';
	}
	echo json_encode($res);
	mysqli_close($con);
?>
<!-- 
{
	"old_password":"123456",
	"new_password":"sp"
}
-->