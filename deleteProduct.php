<?php
	require "connect.php";
	$id = $_POST['id'];

	$query = "DELETE FROM sanphammoi WHERE id = $id";
		$data = mysqli_query($connect,$query);
		if($data){
			$arr = array(
				'success' => true,
				'message' => "Xóa thành công",
			);
		}else{
			$arr = array(
				'success' => false,
				'message' => "Xóa ko thành công",
			);
		}
	echo json_encode($arr);
?>