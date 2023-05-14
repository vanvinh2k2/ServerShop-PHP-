<?php
	require "connect.php";
	$iduser = $_POST['iduser'];

	$query = "SELECT * FROM donhang WHERE iduser = '$iduser'";
	$data = mysqli_query($connect,$query);
	$arraySp = array();
	while($row = mysqli_fetch_assoc($data)){
		$query2 = "SELECT * FROM chitietdonhang,sanphammoi WHERE chitietdonhang.idsanpham = sanphammoi.id AND iddonhang = ".$row['id'];
		$data2 = mysqli_query($connect, $query2);
		$item = array();
		while($row2 = mysqli_fetch_assoc($data2)){
			$item[]=$row2;
		}
		$row['item'] = $item;
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