<?php
include 'config.php';
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
if (!$user_id) {
    header('Location: login.php');
    exit();
}
if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = intval($_POST['product_quantity']);

   // Check stock
   $stock_query = mysqli_query($conn, "SELECT stock FROM product WHERE name = '" . mysqli_real_escape_string($conn, $product_name) . "'");
   $stock_row = mysqli_fetch_assoc($stock_query);
   $available_stock = $stock_row ? intval($stock_row['stock']) : 0;

   if ($product_quantity > $available_stock) {
      $message[] = 'Cannot add more than available stock!';
   } else {
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

      if(mysqli_num_rows($select_cart) > 0){
         $message[] = 'Product already added to cart!';
      }else{
         mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
         $message[] = 'Product added to cart!';
      }
   }

};
?>
<?php
 include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mobilemart-Shopping</title>

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style.css"> -->
   <style>
      *{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border: none;
   text-decoration: none;
   }
   body{
      background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
      min-height: 100vh;
      overflow-X:hidden;
   }

      .message{
   position: sticky;
   top:0; left:0; right:0;
   padding:35px 10px;
   background-color:#ebf2f5;
   text-align: center;
   z-index:1000px;
   box-shadow: var(--box-shadow);
   color:var(--black);
   font-size: 20px;
   text-transform: capitalize;
   cursor: pointer;
}
      .container{
   padding:0 20px;
   margin:0 auto;
   /* max-width: 1200px; */
   padding-bottom: 70px;
}
       .container .products h1.heading{
         font-family: 'Poppins', sans-serif;
         font-size:30px;
         padding:30px 30%;
         text-decoration:underline;
         text-transform:uppercase;
         text-align:center;
         color:#2d3538;
      }
      .container .products .box-container{
   display: flex;
   flex-wrap: wrap;
   gap:12px;
   justify-content: center;
   
}

.container .products .box-container .box{
   text-align: center;
   border-radius: 5px;
   position: relative;
   padding:10px;
   background-color:white;
   width: 250px;
   border:2px solid black;
   box-shadow:0 5px 10px rgba(0,0,0,.1);
}

.container .products .box-container .box img{
   height: 150px;
   width:130px;
}

.container .products .box-container .box .name{
   /* font-size: 25px; */
   color:black;
   padding:5px 0;
}

.container .products .box-container .box .price{
   border-radius: 6px;
   background-color:orange;
   color:white;
   font-size: 18px;
   width:100px;
   text-align:center;
}

.container .products .box-container .box input[type="number"]{
   margin:10px 0;
   width: 100%;
   border:1px solid black;
   border-radius: 5px;
   font-size: 20px;
   color:black;
   padding:12px 14px
}
.btn{
   display: inline-block;
   padding:10px 30px;
   cursor: pointer;
   font-size: 18px;
   color:white;
   border-radius: 5px;
   text-transform: capitalize;
   text-decoration: none;
   background-color:#35b9e6;

}
.btn:hover{
   background-color:#2d3538;
}
   </style>
</head>
<body>
   
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<div class="container">
   <div class="products">
      <h1 class="heading">Products</h1>
      <div class="box-container">
         <?php
         $select_product = mysqli_query($conn, "SELECT * FROM `product` ORDER BY id DESC") or die('query failed');
         if(mysqli_num_rows($select_product) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_product)){
         ?>
         <form method="post" class="box" action="#">
            <img src="<?php echo $fetch_product['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_product['name']; ?></div>
            <div class="price">Rs.<?php echo $fetch_product['price']; ?>/-</div>
            <?php if($fetch_product['stock'] == 0): ?>
                <div style="color: red; font-weight: bold; margin: 10px 0;">Out of Stock</div>
                <input type="number" value="0" disabled>
                <input type="submit" value="Add To Cart" name="add_to_cart" class="btn" disabled>
            <?php else: ?>
                <input type="number" min="1" max="<?php echo $fetch_product['stock']; ?>" name="product_quantity" value="1">
                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                <input type="submit" value="Add To Cart" name="add_to_cart" class="btn">
            <?php endif; ?>
         </form>
         <?php
            };
          };
         ?>
      </div>
   </div>
</div>
<?php
include"footer.php";
?>
</body>
</html>