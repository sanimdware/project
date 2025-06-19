<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="MM.png">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body{
            display:flex;
            flex-direction:column;
            background: #f2f2f2;
            height:100vh;
        }
        nav{
            background: #1b1b1b;
            
        }
      
        .logo1 img{
            float: left;
            width: 70px;
            height: auto;
        }
        nav .logo{
            float: left;
            color: white ;
            font-size: 27px;
            font-weight: 600;
            line-height: 70px;
            padding-left: 10px;
        }
        nav ul{
            float: right;
            list-style: none;
            margin-right: 40px;
            position: relative;
            z-index: 10px;
        }
        nav ul li{
            display: inline-block;
            background: #1b1b1b;;
            margin: 0 5px;
        }
        nav ul li a{
            color: white;
            text-decoration: none;
            line-height: 70px;
            font-size: 18px;
            padding: 9px 15px;
        }
        nav ul li a:hover{
            border-radius: 5px;
            color: cyan;
            box-shadow: 0 0 5px #33ffff,
                        0 0 5px #66ffff;
        }
        nav ul ul li a:hover{
            color: cyan;
            box-shadow: none;
        }
        nav ul ul{
            position: absolute;
            top: 90px;
            border-top: 3px solid cyan;
            opacity: 0;
            visibility: hidden;
            transition: top .3s;
        }
        nav ul li:hover >ul{
            top: 70px;
            opacity: 1;
            visibility: visible;
        }
        nav ul ul li{
            position: relative;
            margin: 0px;
            width: 150px;
            float: none;
            display: list-item;
            border-bottom: 1px solid rgba(0,0,0,0.3);
            text-align:center;
        }
        nav ul ul li a{
            line-height: 50px;

        }
        h1{
            padding:50px 50%;
        }
        nav.img{
            float: left;
            font-size: 27px;
            padding-left:5px;
        }
        nav.sticky{
            position:sticky;
            top: 0;
            left:0;
            width:100%;
            z-index: 99;
        }
        .card-group{
           margin: 10px;
           display:flex;
           justify-content: center;
           flex-wrap: wrap;
        }
       .card{
           background: white;
           width: 350px;
           height:fit-content;
           margin: 10px;
           border:1px solid black;
           border-radius: 15px;
           transition:all 1s ease-in-out 0.2s;
        }
       .card:hover{
           background: white;
           box-shadow:0 0 20px black;
           width: 350px;
           height: fit-content;
           margin: 10px;
           border:1px solid black;
           border-radius: 15px;
        }
       .card-img-top{
           background-color: white;
           height:150px;
           margin-bottom:15px;
           background-size: cover;
           justify-content: center;
           border-radius: 15px;
           width:60%;
           padding:10px;
           
        }
       .card-body{
          margin:12px;
        }
       .card-title{
         font-size:28px;
         text-align:center;
        }
       .card-text{
         font-size:18px;
         font-family:Verdana, Arial, Helvetica, sans-serif;
         padding:5px;
        }
        p{
            padding:3px 0px;
        }
        span{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="sticky"> 
        <div class="logo1">
        <img src="MM.png" alt="#">
        </div>
        <div class="logo">Mobilemart</div>
        
        <ul>
            <li><a href="Home.php" class="active">Home</a></li>
            <li><a href="About.php">About</a></li>
            <li><a href="Contact.php">Contact Us</a></li>
            <li><a href="login.php">Shopping</a></li>
            <li>
                <a href="#">Mobiles +</a>
                <ul>
                    <li><a href="Redmi.php">Redmi</a></li>
                    <li><a href="Samsung.php">Samsung</a></li>
                    <li><a href="Oppo.php">Oppo</a></li>
                    <li><a href="Vivo.php">Vivo</a></li>
                    <li><a href="Oneplus.php">One Plus</a></li>
                    <li><a href="Poco.php">Poco</a></li>
                    <li><a href="Realme.php">Realme</a></li>
                </ul>
            </li>
            <li>
            <a href="#"style="color:white;font-size:30px; padding:10px 0px 0px 0px; "><i class='bx bxs-user-circle'></i></a>
                <ul>
                    <li><a href="Logout.php">Log out</a></li>
                    <li><a href="adminlogin.php">Admin Login</a></li>
                 </ul>
            </li>
            <li>
                <a href="cart.php" style="color:white;font-size:30px;"><i class='bx bx-cart' ></i></a>
            </li>
        </ul>
    </nav>


    
  
    
</body>
</html>