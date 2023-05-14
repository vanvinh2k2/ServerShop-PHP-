<?php
  require "connect.php";
  if(isset($_POST['submit_password']) && $_POST['email']){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $query = "UPDATE user SET pass = '$pass' where email = '$email'";
    $data = mysqli_query($connect,$query);
    if($data){
      echo 'Thanh cong';
    }else{
      echo 'Ko thanh cong';
    }
  }
?>