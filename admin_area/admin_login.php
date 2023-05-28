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
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="form-outline w-50 m-auto mb-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter your username" required="required" class="form-control">
                </div>
                
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required="required" class="form-control">
                </div>
                
                <div class="text-center">
                    <input type="submit" name="admin_login" class="btn btn-info px-3 mb-3" value="Login"">
                    <p class="small fw-bold mt-3">Already have an account? <a href="admin_registration.php"
                                class="text-danger"> Register</a></p>
                     </div>
                </form>
                </div>
    </div>

    <!-- Last child-->
    <div class="bg-info p-3 text-center">
        <p>All right reserved to Boi Bazar - Developed by Md Ashikur Rahman</p>

    </div>

    <!-- Bootstrap Js Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<?php

if(isset($_POST['admin_login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_query="Select * from `admin_table` where admin_name = '$username'";
    $result=mysqli_query($con, $select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    if($row_data>0){ 
        $_SESSION['admin_name']=$username;
        if(password_verify($password,$row_data['admin_password'])){               
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['admin_name']=$user_username;
                echo"<script>alert('Login Successfully')</script>";
                echo"<script>window.open('../admin_area/index.php','_self')</script>";

            }else{
                $_SESSION['admin_name']=$username;
                echo"<script>alert('Login Successfully')</script>";
                echo"<script>window.open('./index.php','_self')</script>";

            }
                
        }else{
            echo"<script>alert('Invalid credentials')</script>";
        }
    }else{
        echo"<script>alert('Invalid credentials')</script>";
    }
}


?>