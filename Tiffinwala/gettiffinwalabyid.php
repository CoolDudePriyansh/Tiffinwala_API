<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();

	$tiffin_id=isset($_GET['id']) ? $_GET['id'] : die();
	$query="SELECT * from tiffinwala where tiffin_id='$tiffin_id' and tiffin_flag=1";

	$jsonObj=array();
	$res=mysqli_query($con,$query);
	
	if (mysqli_num_rows($res)>0) 
	{
		while($row = mysqli_fetch_assoc($res))
			$jsonObj[]=$row;
	}
	else
		$jsonObj['message']='Records not found';
	
	echo json_encode($jsonObj);
	mysqli_close($con);
?>