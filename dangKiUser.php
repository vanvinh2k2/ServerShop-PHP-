<?php
	require "connect.php";
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$username = $_POST['username'];
	$mobile = $_POST['mobile'];
	$query = "SELECT * FROM user WHERE email = '$email'";
	$data = mysqli_query($connect,$query);
	$number = mysqli_num_rows($data);
	if($number == 1){
		$arr = array(
				'success' => false,
				'message' => "Email đã tồn tại",
			);
	}else{
		$query = "INSERT INTO user VALUES(null,'$email','$pass','$username','$mobile')";
		$data = mysqli_query($connect,$query);
		
		if($data){
			$arr = array(
				'success' => true,
				'message' => "Thành công",
			);
		}else {
			$arr = array(
				'success' => false,
				'message' => "Ko thành công",
			);
		}
	}
	
	echo json_encode($arr);
?>