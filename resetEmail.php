<?php
  require "connect.php";
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  $email = $_POST['email'];
  $query = "SELECT * FROM user WHERE email = '$email'";
  $data = mysqli_query($connect,$query);
  $result = array();
  while($row = mysqli_fetch_assoc($data)){
    $result[] = $row;
  }
  if(empty($result)){
    $arr = array(
      'success' => false,
      'message' => "Email ko chính sát",
      'result' => $result
    );
  }else{
    $email = ($result[0]["email"]);
    $pass = ($result[0]["pass"]);

    $link="<a href='http://192.168.1.13:81/banhang/reset_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;
    // GMAIL username
    $mail->Username = "ngov6769@gmail.com";
    // GMAIL password
    $mail->Password = "eykpokxucornnvbn";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From="ngov6769@gmail.com";
    $mail->FromName='App ban hang';
    $mail->AddAddress($email, 'reciever_name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body = $link;
    if($mail->Send()){
      $arr = array(
      'success' => true,
      'message' => "Vui lòng kiểm tra Email",
      'result' => $result
    );
    }else{
      $arr = array(
      'success' => false,
      'message' => "Gởi Email ko thành công",
      'result' => $result
    );
    }
  }
  echo json_encode($arr);
?>