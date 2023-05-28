<?php
if(isset($_GET['delete_user'])){
    $user_id=$_GET['delete_user'];

    $delete_user="Delete from `user_table` where user_id=$user_id";
    $result_user=mysqli_query($con,$delete_user);
    if($result_user){
        echo "<script> alert('User Deleted Successfully')</script>";
        echo "<script> window.open('./index.php','_self')</script>";
    }


}
?>