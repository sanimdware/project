<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = $_POST['password'];

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $message[] = 'Email is invalid';
   } else {
      $select = mysqli_query($conn, "SELECT * FROM `adminlogin` WHERE Email = '$email' AND Password = '$pass'") or die('query failed');

      if(mysqli_num_rows($select) > 0){
         // $row = mysqli_fetch_assoc($select);
         // $_SESSION['user_id'] = $row['id'];
         header('location:adminHeader.php');
      }else{
         $message[] = 'Incorrect password or email!';
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
   <title>Mobilemart-login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="MM.png">
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
      <h4>Admin Login</h4>
      <input type="email" name="email" required placeholder="Enter email" class="box">
      <input type="password" name="password" required placeholder="Enter password" class="box">
      <input type="submit" name="submit" class="btn" value="Login now">
   </form>

</div>

</body>
</html>