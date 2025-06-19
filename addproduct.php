<?php
include("header.php");
?>
<?php
include('config.php');
if(isset($_POST['submit']))
	{
		$name=trim($_POST['name']);
        $price=trim($_POST['price']);
        $image=$_FILES['image'];
        $stock = trim($_POST['stock']);

        if($name === '' || $price === '' || $stock === '' || empty($image['name'])) {
            echo '<div class="alert alert-danger text-center">All fields are required!</div>';
        } else {
		    $filename = $image['name'];
		    $filepath = $image['tmp_name'];
		    $fileerror = $image['error'];
		     if($fileerror==0)
		     {
		     	$destfile = 'upload/'.$filename;
		     	move_uploaded_file($filepath, $destfile);
		     	$query="INSERT INTO product VALUES('','{$name}','{$price}','{$destfile}', '{$stock}')";
                $result=mysqli_query($conn,$query);
		     	if ($result) {
		     		 echo"Product Added Successfully!";
		     	}
		     	else {
		     		echo "not inserted";
		     	}
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
    <link rel="icon" href="1.png">
    <title>Mobilemart-ADD PRODUCT</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
          body{
            /* background-color: rgb(144, 218, 144); */
            background-color:white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* width:100%; */
            height:100vh;

            text-align: center;
            font-family: 'Hind Siliguri', sans-serif;
            overflow:hidden;
            


        }
        .container{
            display:flex;
            justify-content:center;
            align-items:center;
            height:600px;
            width:40%;
            padding:10px;
            margin:10px;
            background-color:#d5deeb;
            border-radius: 10px;
            font-family: 'Hind Siliguri', sans-serif;
        }
        ::placeholder{
          text-align:center;
        }

        /* .box{
          padding:10px;
          background-color: blanchedalmond;
        } */

        .Container{
          display:flex;
          width:100%;
          height:100%;
        }
        .image1{
          display:flex;
          height:600px;
          /* background-color: blanchedalmond; */
          width:30%;
          justify-content:center;
          align-items:center;
          padding:10px;
          /* border:2px solid black; */
        }
        .image1 img{
          height:400px;
        }
      

    </style>
</head>
<body>

<div class="Container">

  <div class="image1">
    <img src="./images/redminote8pro.png" alt=""> 
  </div>

  <div class="container">
    <!-- <div class="box"> -->
      <form method="POST" action="#" enctype="multipart/form-data">
        <label>ADD PRODUCTS TO SHOPPING</label>
        <hr>
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Add Product Name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Price</label>
          <input type="text" class="form-control" name="price" placeholder="Add Product Price" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" class="form-control" name="image" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Stock</label>
          <input type="number" class="form-control" name="stock" placeholder="Add Product Stock" min="0" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    <!-- </div> -->
  </div>
    
  <div class="image1">
  <img src="./images/opnord2.png" alt=""> 
  </div>

</div>
 
<?php
include "footer.php";
?>
</body>
</html>

