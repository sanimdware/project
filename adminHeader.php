<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="MM.png">
    <title>Mobilemart-Admin</title>
    <!-- <script src="admin.js"></script> -->
    <style>
      .mb-3 {
    margin-bottom: 0rem!important;
    }
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
                                overflow-X:hidden;
                                


                            }
                            .container{
                                display:flex;
                                justify-content:center;
                                align-items:center;
                                height:600px;
                                width:30%;
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
                             
                              /* background-color: blanchedalmond; */
                             
                              justify-content:center;
                              align-items:center;
                              padding:10px;
                             
                            }
                            .image1 img{
                              height:400px;
                            } 


    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mx-auto" href="#">Mobilemart-Admin Panel</a>
        <form class="bg-dark">
        <a href="adminlogout.php" class="btn btn-success px-3 mx-3" type="submit">LogOut</a>
      </form>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2 text-center text-danger" id="green">
  <ul class="navbar-nav me-auto mb-lg-0 fs-5">
        <li class="nav-item mb-3">
          <a class="nav-link active" aria-current="page"><i class="fa fa-dashboard" ></i>Dashboard</a>
        </li><hr>
        <li class="nav-item mb-3">
          <a class="nav-link active" aria-current="page" href="addproduct.php"><i class="fa fa-product-hunt"></i>Add Products</a>
        </li><hr>
        <li class="nav-item mb-3">
          <a class="nav-link active" aria-current="page" href="admin_stock.php"><i class="fa fa-cubes"></i>View Stock</a>
        </li><hr>
        <li class="nav-item mb-3">
          <a class="nav-link active" aria-current="page" href="admin_orders.php"><i class="fa fa-shopping-cart"></i>View Orders</a>
        </li><hr>
    </ul>

            </div>
            <!--Contains the main content
                    of the webpage-->
            <div  id="admin" class="col-10">
            
            </div>
              
          
  </body>
  </html>
            

