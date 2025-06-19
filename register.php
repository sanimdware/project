<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass_raw = $_POST['password'];
   $cpass_raw = $_POST['cpassword'];
   $pass = mysqli_real_escape_string($conn, md5($pass_raw));
   $cpass = mysqli_real_escape_string($conn, md5($cpass_raw));

   if($pass_raw !== $cpass_raw){
      $message[] = 'Password and Confirm Password do not match!';
   } else {
      $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

      if(mysqli_num_rows($select) > 0){
         $message[] = 'user already exist!';
      }else{
         mysqli_query($conn, "INSERT INTO `user_info`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mobilemart-Registration</title>
   <link rel="icon" href="1.png">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="name" required placeholder="Enter username" class="box">
      <input type="email" name="email" required placeholder="Enter email" class="box">
      <input type="password" name="password" required placeholder="Enter password" class="box">
      <input type="password" name="cpassword" required placeholder="Confirm password" class="box">
      <input type="submit" name="submit" class="btn" value="Register now">
      <p>Already have an account? <a href="login.php">Login now</a></p>
   </form>

</div>

</body>
</html>