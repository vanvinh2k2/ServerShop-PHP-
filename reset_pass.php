<?php
	require "connect.php";
	if($_GET['key'] && $_GET['reset']){
		$email = $_GET['key'];
		$pass = $_GET['reset'];
		$query = "SELECT email, pass FROM user WHERE email = '$email' AND pass = '$pass'";
		$data = mysqli_query($connect,$query);
		if($data == true){
		    ?>
		    <h3>RESET PASSWORD</h3>
		    <form method="post" action="submit_new.php">
		    <input type="hidden" name="email" value="<?php echo $email;?>">
		    <p>Enter New password</p>
		    <input type="password" name='password'>
		    <input type="submit" name="submit_password">
		    </form>
		    <?php
		  }
	}
?>