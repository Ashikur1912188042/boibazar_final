<!-- connect files -->
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
    <title>User- Registration</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">        
</head>

<body>
    
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Username Field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
                            name="user_username" autocomplete="off" required="required" />
                    </div>
                    <!-- Email Field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email"
                            name="user_email" autocomplete="off" required="required" />
                    </div>
                    
                    <!-- Image Field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Image</label>
                        <input type="file" id="user_image" class="form-control" name="user_image" autocomplete="off" required="required"/>
                    </div>

                    <!-- Password Field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your Password"
                            name="user_password" autocomplete="off" required="required" />
                    </div>
                    <!-- Confirm Password Field -->
                    <div class="form-outline mb-4">
                        <label for="confirm_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_user_password" class="form-control"
                            placeholder="Confirm your Password" name="confirm_user_password" autocomplete="off"
                            required="required" />
                    </div>
                    <!-- Address Field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address"
                            name="user_address" autocomplete="off" required="required" />
                    </div>
                    <!-- Contact Field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number"
                            name="user_contact" autocomplete="off" required="required" />
                    </div>
                    <div class="text-center m-4">
                    <input type="submit" value="Register" class="bg-info border px-3 m-3 p-3 py-2" name="user_register">
                        <p class="small fw-bold mt-3">Already have an account? <a href="user_login.php"
                                class="text-danger"> Login</a></p>
                    </div>

                </form>

            </div>


        </div>
    </div>



<!-- Php Code For user registration -->
    <?php
    if(isset($_POST['user_register'])){

        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $password_hash=password_hash($user_password, PASSWORD_DEFAULT);
        $confirm_user_password = $_POST['confirm_user_password'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        $user_ip=getIPAddress();

        $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
        $result=mysqli_query($con, $select_query);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0){
            echo"<script>alert('Username and Email already exist')</script>";
            
        }elseif($user_password!= $confirm_user_password){
            echo"<script>alert('Password do not match')</script>";
        }else{
            move_uploaded_file($temp_image,"./user_images/$user_image");
        $insert_query= "insert into `user_table` (username, user_email,user_password,user_image,user_ip,user_address,user_contact) 
        values('$user_username','$user_email','$password_hash',' $user_image','$user_ip',' $user_address', '$user_contact')";

        $sql_execute=mysqli_query($con, $insert_query);
        
        if($sql_execute){
            echo"<script>alert('Data inserted successfully')</script>";
        }else{
            die(mysqli_error($con));
        }
        }

        //Selecting cart items
        $select_cart_item="Select * from `cart_details` where ip_address='$user_ip'";
        $result_cart=mysqli_query($con, $select_cart_item);
        $rows_count=mysqli_num_rows($result_cart);
        if($rows_count>0){
            $_SESSION['username']=$user_username;
            echo"<script>alert('You have items in your cart')</script>";
            echo"<script>window.open('checkout.php','_self')</script>";
            
        }else{
            echo"<script>window.open('../index.php','_self')</script>";
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