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

// Fetch best sold item
$bestSoldQuery = mysqli_query($conn, "SELECT * FROM products ORDER BY sold_count DESC LIMIT 1");
$bestSoldItem = mysqli_fetch_assoc($bestSoldQuery);

// Fetch most viewed item
$mostViewedQuery = mysqli_query($conn, "SELECT * FROM products ORDER BY view_count DESC LIMIT 1");
$mostViewedItem = mysqli_fetch_assoc($mostViewedQuery);

// Fetch latest products (most recently added)
$latestProductsQuery = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC LIMIT 3");
$latestProducts = [];
while($row = mysqli_fetch_assoc($latestProductsQuery)) {
    $latestProducts[] = $row;
}

?>
<?php
include"header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobilemart-home</title>
    
    <style>
      *{
           box-sizing: border-box;
           padding: 0;
           margin: 0;
       }
       body{ 
           background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
           min-height: 100vh;
       }
       .paragraph{
           display: flex;
           align-items:center;
           height:18vh;
           color:black;
           justify-content:center;
           margin-bottom:12px;
           padding: 4px 0px;
           box-shadow:0 0 20px black;
       }
       .box{
         border: 3px solid black;
         text-align:center;
         padding:15px;
         border-radius:20px;
       }
       .card-group{
           margin: 10px;
           display:flex;
           justify-content: center;
           flex-wrap: wrap;
       }
       .card{
           background: white;
           width: 270px;
           height: 440px;
           margin: 10px;
           border:1px solid black;
           border-radius: 15px;
           transition:all 1s ease-in-out 0.2s;
       }
       .card:hover{
           background: white;
           box-shadow:0 0 20px black;
           width: 270px;
           height: 440px;
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
         font-size:24px;
         text-align:center;
       }
       .card-text{
         font-size:15px;
         font-family:Verdana, Arial, Helvetica, sans-serif;
         padding:5px;

       }
       .btn-primary{
         text-align:center;
       }
       p{
        padding:0px 0px;
       }
       .latest-products-section {
           margin: 40px 0;
           padding: 20px;
           background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
           border-radius: 15px;
           margin-left: 20px;
           margin-right: 20px;
       }
       .latest-products-title {
           text-align: center;
           color: black;
           font-size: 32px;
           margin-bottom: 30px;
           text-decoration: underline;
       }
       .latest-product-card {
           background: white;
           width: 270px;
           height: 440px;
           margin: 10px;
           border: 1px solid black;
           border-radius: 15px;
           transition: all 1s ease-in-out 0.2s;
           position: relative;
           overflow: hidden;
       }
       .latest-product-card:hover {
           background: white;
           box-shadow: 0 0 20px black;
           width: 270px;
           height: 440px;
           margin: 10px;
           border: 1px solid black;
           border-radius: 15px;
       }
       .new-badge {
           position: absolute;
           top: 10px;
           left: 10px;
           background: #ff6b6b;
           color: white;
           padding: 5px 10px;
           border-radius: 20px;
           font-size: 12px;
           font-weight: bold;
       }
       .latest-product-img {
           background-color: white;
           height: 275px;
           width: 85%;
           object-fit: contain;
           margin: 15px auto;
           display: block;
       }
       .latest-product-title-text {
           font-size: 24px;
           text-align: center;
           font-weight: bold;
           color: #333;
           margin: 10px 0;
       }
       .latest-product-price {
           text-align: center;
           color: #333;
           font-size: 16px;
           font-weight: bold;
           margin: 10px 0;
       }
       .latest-product-btn {
           text-align: center;
           margin: 10px auto;
           padding: 8px 15px;
           background: #35b9e6;
           color: white;
           text-decoration: none;
           border-radius: 5px;
           text-align: center;
           transition: all 0.3s ease;
       }
       .latest-product-btn:hover {
           background: #2d3538;
       }
    </style>
</head>
<body>
    <!-- Latest Products Section -->
    <div class="latest-products-section">
        <h2 class="latest-products-title">Latest Products</h2>
        <div class="card-group">
            <?php if(!empty($latestProducts)): ?>
                <?php foreach($latestProducts as $index => $product): ?>
                    <div class="latest-product-card">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" class="latest-product-img" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="card-body">
                            <h5 class="latest-product-title-text"><?php echo htmlspecialchars($product['name']); ?></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="text-align: center; color: black; font-size: 18px; width: 100%;">
                    No products available yet. Add some products through the admin panel!
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Existing Products Section -->
    <div class="paragraph" style="background: none; box-shadow: none;">
      <div class="box" style="border: none; background: none;">
      <h2 style="font-size: 40px; text-decoration: underline;"><p>The full specification and price of mobiles</p></h2>
      </div>
    </div>

  <div class="card-group">
  <div class="card">
    <img src="./images/redimi14.png" class="card-img-top" alt="#" >
    <div class="card-body">
      <h5 class="card-title">Redmi Note 14 </h5>
      <div class="card-text">
        <p>Launch:2024,Sept.24</p>
        <p>Dimensions:161.4x76.4x8.8mm</p>
        <p>Weight:200g</p>
        <p>Build:Gorilla Glass 5(Front & Back)</p>
        <p>SIM:Hybrid Dual Sim</p>
        <p>Size:6.53inches</p>
        <p>Resolution:1080x2340pixels</p>
        <p>Protection:Corning Gorilla Glass 5</p>
        <p>Os:Android 9.0(Pie)</p>
        <p>Chipset:Mediatek Helio G90T</p>
      </div>
      <div class="btn-primary">
        <a href="Redmi.php">More About Redmi</a>
      </div>
      
    </div>
  </div>
  <div class="card">
    <img src="./images/s25ultra.png" class="card-img-top" alt="#">
    <div class="card-body">
      <h5 class="card-title">Samsung S25 Ultra</h5>
      <div class="card-text">
        <p>Launch:2025,Jan 22</p>
        <p>Dimensions:162.8x77.6x8.8.2mm</p>
        <p>Weight:218g</p>
        <p>Build:Corning gorrila armor 2+(Front & Back)</p>
        <p>SIM:Dual SIM (2 Nano-SIMs + eSIM, dual stand-by)</p>
      </div>
      <div class="btn-primary">
        <a href="Samsung.php">More About Samsung</a>
      </div>
     
    </div>
  </div>
  <div class="card">
    <img src="./images/iphone16.png" class="card-img-top" alt="#">
    <div class="card-body">
      <h5 class="card-title">Iphone 16 Pro Max</h5>
      <p class="card-text">
        <p>Launch:2025,Jan 22</p>
        <p>Dimensions:162.8x77.6x8.8.2mm</p>
        <p>Weight:218g</p>
        <p>Build:Corning gorrila armor 2+(Front & Back)</p>
        <p>SIM:Dual SIM (2 Nano-SIMs + eSIM, dual stand-by)</p>
      </div>
      <div class="btn-primary">
        <a href="Oppo.php">More About Iphone</a>
      </div>
    </div>
  <div class="card">
    <img src="./images/vivov23.png" class="card-img-top" alt="#">
    <div class="card-body">
      <h5 class="card-title">Vivo V23 5G</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <div class="btn-primary">
        <a href="Vivo.php">More About Vivo</a>
      </div>
    </div>
  
  
  </div>
  <div class="card">
    <img src="./images/pocoX3pro.png" class="card-img-top" alt="#">
    <div class="card-body">
      <h5 class="card-title">Poco X3 Pro</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <div class="btn-primary">
        <a href="Poco.php">More About Poco</a>
      </div>
    </div>
  
  </div>
  <div class="card">
    <img src="./images/realme9pro+.png" class="card-img-top" alt="#">
    <div class="card-body">
      <h5 class="card-title">Realme 9 Pro+</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <div class="btn-primary">
        <a href="Realme.php">More About Realme</a>
      </div>
      
    </div>
  </div>
  <div class="card">
    <img src="./images/pocoX3pro.png" class="card-img-top" alt="#">
    <div class="card-body">
      <h5 class="card-title">Poco X3 Pro</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <div class="btn-primary">
        <a href="Poco.php">More About Poco</a>
      </div>
    </div>
  </div>
  <div class="card">
    <img src="./images/redimi14.png" class="card-img-top" alt="#" >
    <div class="card-body">
      <h5 class="card-title">Redmi Note 14 </h5>
      <div class="card-text">
        <p>Launch:2024,Sept.24</p>
        <p>Dimensions:161.4x76.4x8.8mm</p>
        <p>Weight:200g</p>
        <p>Build:Gorilla Glass 5(Front & Back)</p>
        <p>SIM:Hybrid Dual Sim</p>
        <p>Size:6.53inches</p>
        <p>Resolution:1080x2340pixels</p>
        <p>Protection:Corning Gorilla Glass 5</p>
        <p>Os:Android 9.0(Pie)</p>
        <p>Chipset:Mediatek Helio G90T</p>
      </div>
      <div class="btn-primary">
        <a href="Redmi.php">More About Redmi</a>
      </div>
      
    </div>
  </div>
</div>
</body>
</html>
<?php
include"footer.php";
?>
