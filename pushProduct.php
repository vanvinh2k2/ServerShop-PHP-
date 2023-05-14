<?php
	require "connect.php";
	$tensp = $_POST['tensp'];
	$giasp = $_POST['giasp'];
	$hinhanh = $_POST['hinhanh'];
	$mota = $_POST['mota'];
	$loai = $_POST['loai'];

	$query = "INSERT INTO sanphammoi VALUES(null,'$tensp','$giasp','$hinhanh','$mota',$loai)";
		$data = mysqli_query($connect,$query);
		if(!empty($data)){
			$arr = array(
				'success' => true,
				'message' => "Thêm thành công",
			);
		}else{
			$arr = array(
				'success' => false,
				'message' => "Ko thành công",
			);
		}
	echo json_encode($arr);
?>