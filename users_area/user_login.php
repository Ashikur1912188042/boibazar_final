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
    <title>User- Login</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center"> Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- Username Field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control " placeholder="Enter your username" name="user_username" autocomplete="off" required="required" />
                    </div>
                    
                    <!-- Password Field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your Password" name="user_password" autocomplete="off" required="required" />
                    </div>
                    
                    <div class="text-center m-4">
                        <input type="submit" id="user_login" value="Login" class="bg-info py-2 px-3 border-0" name="user_login" />

                        <p class="small fw-bold mt-3">Don't have an account? <a href="user_registration.php" class="text-danger"> Register</a></p>
                    </div>

                </form>

            </div>


        </div>
    </div>

    <!-- Last child-->
    <div class="bg-info p-3 text-center">
        <p>All right reserved to Boi Bazar - Developed by Boi Bazar</p>

    </div>

    <!-- Bootstrap Js Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>


<?php

if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query="Select * from `user_table` where username = '$user_username'";
    $result=mysqli_query($con, $select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //cart items
    $select_query_cart="Select * from `cart_details` where 
    ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($result_cart);
    if($row_count>0){ 
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){               
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo"<script>alert('Login Successfully')</script>";
                echo"<script>window.open('../index.php','_self')</script>";

            }else{
                $_SESSION['username']=$user_username;
                echo"<script>alert('Login Successfully')</script>";
                echo"<script>window.open('payment.php','_self')</script>";

            }
                
        }else{
            echo"<script>alert('Invalid credentials')</script>";
        }
    }else{
        echo"<script>alert('Invalid credentials')</script>";
    }
}


?>