<?php
include "config.php";
session_start();
if(isset($_POST["submit"])){
$email=mysqli_real_escape_string($conn,$_POST["email"]);
$password=mysqli_real_escape_string($conn,md5($_POST["password"]));
$exist=mysqli_query($conn,"SELECT * FROM `user` WHERE email='$email' AND password='$password'") or die("query failed");
if(mysqli_num_rows($exist)>0){
     $row = mysqli_fetch_assoc($exist);
	 if($row['user_type']=='admin'){
		 $_SESSION['admin_name']=$row['username'];
		 $_SESSION['admin_email']=$row['email'];
		 $_SESSION['admin_id']=$row['id'];
		 header("location:dashboard.php");
	 }
	 else{
		  $_SESSION['user_name']=$row['username'];
		 $_SESSION['user_email']=$row['email'];
		 $_SESSION['user_id']=$row['id'];
		 header("location:home.php");
	 }
}
else{
	$message[]="wrong email or password";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/register-login.css">
</head>
<body>
	<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
    <div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>