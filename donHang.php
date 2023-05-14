<?php
	require "connect.php";
	$iduser = $_POST['iduser'];
	$diachi = $_POST['diachi'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$soluong = $_POST['soluong'];
	$tongtien = $_POST['tongtien'];
	$chitiet = $_POST['chitiet'];

	$query = "INSERT INTO donhang VALUES(null,'$iduser','$diachi','$mobile','$email','$soluong','$tongtien')";
	$data = mysqli_query($connect,$query);
	if($data == true){
		$query = "SELECT id AS iddonhang FROM donhang WHERE iduser = '$iduser' ORDER BY id DESC LIMIT 1";
		$data = mysqli_query($connect,$query);
		while($row = mysqli_fetch_assoc($data)){
			$iddonhang = $row;
		}
		if(!empty($iddonhang)){
			$chitiet = json_decode($chitiet, true);
			foreach ($chitiet as $key => $value) {
				$iddh = $iddonhang["iddonhang"];
				$idsp = $value["idsanpham"];
				$sl = $value["soluong"];
				$g = $value["gia"];
				$query1 = "INSERT INTO chitietdonhang VALUES ('$iddh','$idsp','$sl','$g')";
				$data = mysqli_query($connect,$query1);
			}
			if($data){
				$arr = array(
					'success' => true,
					'message' => "thanh cong"
				);
			}else{
				$arr = array(
					'success' => false,
					'message' => "ko thanh cong"
				);
			}
			print_r(json_encode($arr));
		}
	}else{
		$arr = array(
			'success' => false,
			'message' => "ko thanh cong"
		);
		print_r(json_encode($arr));
	}
?>