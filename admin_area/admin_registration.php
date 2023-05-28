<?php
include('../includes/connect.php');
include('../functions/common_function.php');
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
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="form-outline w-50 m-auto mb-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter your username" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="username" placeholder="Enter your email" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_admin_password" placeholder="Confirm your password" required="required" class="form-control">
                </div>
                <div class="text-center">
                    <input type="submit" name="admin_register" class="btn btn-info px-3 mb-3" value="Register"">
                    <p class="small fw-bold mt-3">Already have an account? <a href="admin_login.php"
                                class="text-danger"> Login</a></p>
                     </div>
                </form>
                </div>
    </div>


    <!-- Php Code For user registration -->

    <?php
    if(isset($_POST['admin_register'])){

        $admin_username = $_POST['username'];
        $admin_email = $_POST['email'];
        $admin_password = $_POST['password'];
        $password_hash=password_hash($admin_password, PASSWORD_DEFAULT);
        $confirm_admin_password = $_POST['confirm_password'];

        $user_ip=getIPAddress();

        $select_query="Select * from `admin_table` where admin_name='$admin_username' or admin_email='$admin_email'";
        $result_admin=mysqli_query($con, $select_query);
        $rows_count=mysqli_num_rows($result_admin);
        if($rows_count>0){
            echo"<script>alert('Username and Email already exist')</script>";
            
        }elseif($user_password!= $confirm_user_password){
            echo"<script>alert('Password do not match')</script>";
        }else{
            
        $insert_query= "insert into `admin_table` (admin_name, admin_email,admin_password) 
        values('$admin_username','$admin_email','$password_hash')";

        $sql_execute=mysqli_query($con, $insert_query);
        
        if($sql_execute){
            echo"<script>alert('Data inserted successfully')</script>";
            echo"<script>window.open('./index.php','_self')</script>";
        }else{
            die(mysqli_error($con));
        }
        
        
        }
    }
    ?>


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