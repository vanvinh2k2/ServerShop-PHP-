<?php
	require "connect.php";
	$page = $_POST['page'];
	$loai = $_POST['loai'];
	$total = 5;
	$pos = ($page-1)*$total;
	$kq = "$pos".","."$total";
	$query = "SELECT * FROM sanphammoi WHERE loai = '$loai' LIMIT $kq";
	$data = mysqli_query($connect,$query);

	$arraySp = array();
	while($row = mysqli_fetch_assoc($data)){
		$arraySp[] = $row;
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
	echo json_encode($arr);
?>