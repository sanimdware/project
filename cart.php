<?php

include 'config.php';
session_start();

// Check if user is logged in before accessing user_id
if(!isset($_SESSION['user_id'])){
    header('location:login.php'); // Redirect to login if not logged in
    exit();
}

$user_id = $_SESSION['user_id'];

$cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

if(isset($_POST['update_cart'])){
   $update_quantity = intval($_POST['cart_quantity']);
   $update_id = $_POST['cart_id'];
   // Get product name and current quantity from cart
   $cart_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name, quantity FROM cart WHERE id = '$update_id'"));
   $product_name = $cart_row ? $cart_row['name'] : '';
   $current_quantity = $cart_row ? intval($cart_row['quantity']) : 1;
   $stock_query = mysqli_query($conn, "SELECT stock FROM product WHERE name = '" . mysqli_real_escape_string($conn, $product_name) . "'");
   $stock_row = mysqli_fetch_assoc($stock_query);
   $available_stock = $stock_row ? intval($stock_row['stock']) : 0;
   if ($update_quantity > $available_stock) {
      $message[] = 'Cannot update to more than available stock!';
      // Do not update the cart, keep the old value
      $_POST['cart_quantity'] = $current_quantity;
   } else {
      mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
      $message[] = 'Cart quantity updated successfully!';
   }
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:cart.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_POST['place_order']) && mysqli_num_rows($cart_query) > 0)
{
    // Check stock for all cart items before placing order
    mysqli_data_seek($cart_query, 0); // Reset pointer
    $stock_error = false;
    $error_products = [];
    $invalid_cart = [];
    while($fetch_cart = mysqli_fetch_assoc($cart_query)){
        $stock_query = mysqli_query($conn, "SELECT stock FROM product WHERE name = '" . mysqli_real_escape_string($conn, $fetch_cart['name']) . "'");
        $stock_row = mysqli_fetch_assoc($stock_query);
        $available_stock = $stock_row ? intval($stock_row['stock']) : 0;
        if ($fetch_cart['quantity'] > $available_stock) {
            $stock_error = true;
            $error_products[] = $fetch_cart['name'];
            $invalid_cart[$fetch_cart['id']] = $available_stock;
        }
    }
    if ($stock_error) {
        $message[] = 'Cannot place order: Not enough stock for: ' . implode(', ', $error_products);
        // Optionally, reset invalid cart items to max available stock
        foreach ($invalid_cart as $cart_id => $max_stock) {
            mysqli_query($conn, "UPDATE cart SET quantity = '$max_stock' WHERE id = '$cart_id'");
        }
    } else {
        mysqli_data_seek($cart_query, 0); // Reset pointer again
        while($fetch_cart = mysqli_fetch_assoc($cart_query)){
            $product_id_query = mysqli_query($conn, "SELECT id FROM product WHERE name = '" . mysqli_real_escape_string($conn, $fetch_cart['name']) . "'");
            $product_row = mysqli_fetch_assoc($product_id_query);
            $product_id = $product_row ? $product_row['id'] : 0;
            mysqli_query($conn, "INSERT INTO orders (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', '{$fetch_cart['quantity']}')");
            // Update stock
            mysqli_query($conn, "UPDATE product SET stock = GREATEST(stock - {$fetch_cart['quantity']}, 0) WHERE id = '$product_id'");
        }
        // Clear cart
        mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");
        $message[] = 'Order placed successfully!';
    }
}
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
   <title>Mobilemart-Cart</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      body{
            overflow-X:hidden;
         }
       .container .shopping-cart h1.heading{
         font-size:30px;
         padding:30px 30%;
         text-decoration:underline;
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


<div class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>
      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>
      <tbody>
      <?php
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><img src="<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>Rs.<?php echo $fetch_cart['price']; ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <?php
                  $stock_query = mysqli_query($conn, "SELECT stock FROM product WHERE name = '" . mysqli_real_escape_string($conn, $fetch_cart['name']) . "'");
                  $stock_row = mysqli_fetch_assoc($stock_query);
                  $available_stock = $stock_row ? intval($stock_row['stock']) : 1;
                  ?>
                  <input type="number" min="1" max="<?php echo $available_stock; ?>" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="update" class="option-btn">
               </form>
            </td>
            <td>Rs.<?php echo $sub_total =($fetch_cart['price']*$fetch_cart['quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('Do you want to remove item from cart?');">remove</a></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">Grand total :</td>
         <td>Rs.<?php echo $grand_total; ?>/-</td>
         <td><a href="cart.php?delete_all" onclick="return confirm('Do you want to delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
      </tr>
   </tbody>
   </table>

   <div class="cart-btn">  
      <a href="shopping.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Return to Shopping</a>
      <?php if($grand_total > 0): ?>
      <form method="post" style="display:inline;">
         <button type="submit" name="place_order" class="btn btn-success">Order</button>
      </form>
      <?php endif; ?>
   </div>

</div>

</div>

</body>
</html>
<?php
include"footer.php"
?>