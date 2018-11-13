<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();

	$user_id=isset($_GET['id']) ? $_GET['id'] : die();
	$query="SELECT t1.tiffin_name, o.quantity, o.amount, o.date, t.menu_desc, t.menu_items FROM `order_item` as o, `user` as u, `tiffin_menu` as t, `tiffinwala` as t1 where o.tiffinvo_tiffin_id=t1.tiffin_id and o.uservo_user_id=u.user_id and o.menuvo_menu_id=t.menu_id and u.user_id='$user_id'";
	
	$jsonObj=array();
	$res=mysqli_query($con,$query);
	
	if (mysqli_num_rows($res)>0) 
	{
		while($row = mysqli_fetch_assoc($res))
			$jsonObj[]=$row;
	}
	else
		$jsonObj['message']='Records not found in Past Order';
	
	echo json_encode($jsonObj);
	mysqli_close($con);
?>