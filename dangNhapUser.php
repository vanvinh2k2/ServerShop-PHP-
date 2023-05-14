<?php
	require "connect.php";
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$query = "SELECT * FROM user WHERE email = '$email' AND pass = '$pass'";
	$data = mysqli_query($connect,$query);
	class User{
		public $id;
		public $email;
		public $pass;
		public $username;
		public $mobile;
		public function __construct($id,$email,$pass,$username,$mobile){
			$this->id = $id;
			$this->email = $email;
			$this->pass = $pass;
			$this->username = $username;
			$this->mobile = $mobile;
		}
	}
	$arrayUser = array();
	while($row = mysqli_fetch_assoc($data)){
		array_push($arrayUser, new User($row['id'],$row['email'],$row['pass'],$row['username'],$row['mobile']));
	}
	if(!empty($arrayUser)){
		$arr = array(
			'success' => true,
			'message' => "Đăng nhập thành công",
			'result' => $arrayUser
		);
	}else{
		$arr = array(
			'success' => false,
			'message' => "Email hoặc password ko chính xác",
			'result' => $arrayUser
		);
	}
	echo json_encode($arr);
?>