<!-- connect files -->
<?php

include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .profile_img{
            width: 80%;
            margin: auto;
            display: block;
            height: 100%;
            object-fit: contain;

        }
        .edit_image{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <!--Navbar-->
    <div class.container-fluid>
        <!-- First child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo-no-background.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item()?></sup></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                        </li>

                        
                        <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">

                            <input type="submit" value="Search" class="btn btn-outline-light " name="search_data_product">
                        </form>
                </div>
            </div>
        </nav>


    </div>
    <!--Second child-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
        
            <?php
            
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>  Welcome Guest</i></a>
            </li>";
            }else{
                echo"<li class='nav-item'>
                <a class='nav-link' href='#'> Welcome ".$_SESSION['username']."</a>
            </li>";

            }
             
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='user_login.php'>Login</i></a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='logout.php'>Logout</i></a>
            </li>";
            }
            ?>
        </ul>
    </nav>
    <!--Third child-->
    <div class="bg-light">
        <h3 class="text-center">
            Boi Bazar
        </h3>
        <p class="text-center">
            “If you don’t like to read, you haven’t found the right book.” - J.K. Rowling
        </p>
    </div>

    <!--Fourth child-->
    <div class="row">
        <div class="col-md-2 p-0">
            <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="profile.php"><h4>Your Profile</h4></a>
                </li>
                <?php
                    $username=$_SESSION['username'];
                    $user_image="Select * from `user_table` where username='$username'";
                    $user_image=mysqli_query($con, $user_image);
                    $row_image=mysqli_fetch_array($user_image);
                    $user_image=$row_image['user_image'];
                    echo"<li class='nav-item'><img src='./user_images/$user_image' alt='' class='profile_img mb-4' alt=''></li>";
                ?>
                
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php">Pending Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php? my_orders">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php? edit_account">Edit Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php? delete_account">Delete Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="logout.php">Logout</a>
                </li>

            </ul>

        </div>
        <div class="col-md-10 p-0 text-center">
            <?php get_user_order_details();
            if(isset($_GET['edit_account'])){
                include('edit_account.php');
            }
            if(isset($_GET['my_orders'])){
                include('user_orders.php');
            }
            if(isset($_GET['delete_account'])){
                include('delete_account.php');
            }
            ?>
        </div>

    </div>
    







    <!-- Last child-->
    <div class="bg-info p-3 text-center">
        <p>All right reserved to Boi Bazar - Developed by Md Ashikur Rahman</p>

    </div>









    <!-- Bootstrap Js Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>