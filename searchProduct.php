<?php
	require "connect.php";
	$search = $_POST['search'];
	if(empty($search)){
		$arr = array(
				'success' => false,
				'message' => "ko thanh cong",
			);
	}else{
		$query = "SELECT * FROM sanphammoi WHERE tensp LIKE '%".$search."%'";
		$data = mysqli_query($connect,$query);
		$arraySp = array();
		while($row = mysqli_fetch_assoc($data)){
			$arraySp[]=($row);
		}
		if(!empty($arraySp)){
			$arr = array(
				'success' => true,
				'message' => "thanh cong",
				'result' => $arraySp
			);
		}else{
			$arr = array(
				'success' => false,
				'message' => "ko thanh cong",
				'result' => $arraySp
			);
		}
	}
	echo json_encode($arr);
	
?>