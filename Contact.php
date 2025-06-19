<?php

include 'config.php';
session_start();
// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// };

// if(isset($_GET['logout'])){
//    unset($user_id);
//    session_destroy();
//    header('location:login.php');
// };
?>
<?php
include"header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobilemart-ContactUS</title>
    
    <style>
      * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
      }
      body {
        background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
        min-height: 100vh;
      }
      .contact-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(44,62,80,0.12);
        border: 1.5px solid #e3e8ee;
        max-width: 400px;
        margin: 40px auto 0 auto;
        padding: 32px 40px;
        text-align: center;
      }
      .contact-avatar {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 16px;
      }
      .contact-avatar img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        margin-bottom: 0;
        box-shadow: 0 2px 12px rgba(44, 62, 80, 0.10);
        border: 3px solid #e0eafc;
        background: #f4f8fb;
        object-fit: cover;
      }
      .contact-title {
        font-size: 32px;
        margin-bottom: 18px;
        color: #2c3e50;
        position: relative;
        font-weight: bold;
      }
      .contact-title::after {
        content: '';
        display: block;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        margin: 12px auto 0 auto;
        border-radius: 2px;
      }
      .contact-details {
        font-size: 20px;
        margin-top: 18px;
      }
      .contact-details div {
        margin: 18px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
      }
      .contact-details a {
        color: #2c3e50;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
      }
      .contact-details a:hover {
        color: #667eea;
        text-decoration: underline;
      }
      .contact-details .icon {
        font-size: 22px;
        color: #667eea;
        min-width: 28px;
        text-align: center;
      }
      .more-info {
        margin: 32px 0 18px 0;
        font-size: 17px;
        color: #444;
      }
      .business-hours {
        margin: 10px 0 18px 0;
        font-size: 16px;
        color: #555;
      }
      .social-links {
        margin: 10px 0 18px 0;
      }
      .social-links a {
        margin: 0 8px;
        color: #667eea;
        font-size: 22px;
        transition: color 0.2s;
      }
      .social-links a:hover {
        color: #764ba2;
      }
      .contact-form {
        margin-top: 24px;
        text-align: left;
      }
      .contact-form label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: #2c3e50;
      }
      .contact-form input, .contact-form textarea {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 16px;
        border: 1px solid #ccd6e0;
        border-radius: 6px;
        font-size: 16px;
        background: #f7fafd;
        resize: none;
      }
      .contact-form textarea {
        min-height: 80px;
      }
      .contact-form button {
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 10px 28px;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
      }
      .contact-form button:hover {
        background: linear-gradient(90deg, #764ba2 0%, #667eea 100%);
      }
      @media (max-width: 500px) {
        .contact-card {
          padding: 18px 6vw;
        }
        .contact-title {
          font-size: 24px;
        }
        .contact-details {
          font-size: 16px;
        }
      }
    </style>
</head>
<body>
  <div class="contact-card">
    <div class="contact-avatar">
      <img src="MM.png" alt="Mobilemart Logo" />
    </div>
    <div class="contact-title">Contact Us</div>
    <div class="contact-details">
      <div><span class="icon"><i class="fa-solid fa-location-dot"></i></span> Bhaktapur</div>
      <div><span class="icon"><i class="fa-solid fa-phone"></i></span> <a href="tel:+9779812345678">+977 9812345678</a></div>
      <div><span class="icon"><i class="fa-solid fa-envelope"></i></span> <a href="mailto:mobile@gmail.com">mobile@gmail.com</a></div>
    </div>
  </div>
</body>
</html>
<?php
include"footer.php";
?>