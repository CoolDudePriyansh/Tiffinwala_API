<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();

	$tiffin_id=isset($_GET['id']) ? $_GET['id'] : die();
	$query="SELECT t.*,tm.* FROM tiffinwala as t, tiffin_menu as tm where t.tiffin_id=tm.tiffinvo_tiffin_id and t.tiffin_id='$tiffin_id'";

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