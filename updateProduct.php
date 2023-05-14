<?php
	require "connect.php";
	$id = $_POST['id'];
	$tensp = $_POST['tensp'];
	$giasp = $_POST['giasp'];
	$hinhanh = $_POST['hinhanh'];
	$mota = $_POST['mota'];

	$query = "UPDATE sanphammoi SET tensp = '$tensp', giasp = $giasp, hinhanh = '$hinhanh', mota = '$mota' WHERE id = $id";
		$data = mysqli_query($connect,$query);
		if($data){
			$arr = array(
				'success' => true,
				'message' => "Sửa thành công",
			);
		}else{
			$arr = array(
				'success' => false,
				'message' => "Sửa ko thành công",
			);
		}
	echo json_encode($arr);
?>