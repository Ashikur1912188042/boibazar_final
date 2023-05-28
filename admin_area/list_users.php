
<h3 class="text-center text-success"> All Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info text-center">
            <tr>
                <th>Serial No</th>
                <th>Username</th>
                <th>User Email</th>
                <th>User Address</th>
                <th>User Mobile</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

        </tbody class="bg-secondary text-light">

<?php
         $get_users= "Select * from `user_table`";
         $result=mysqli_query($con, $get_users);
         $number=0;
         while($row=mysqli_fetch_assoc($result)){
            $user_id=$row['user_id'];
            $username=$row['username'];
            $user_email	=$row['user_email'];
            $user_address=$row['user_address'];
            $user_contact=$row['user_contact'];
            $number++;

            echo"<tr class='bg-secondary text-light text-center'>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>

            <td>$user_address</td>
            <td>$user_contact</td>


            
            <td><a href='index.php?delete_user=$user_id' class='text-light'> <i class='fa-solid fa-trash'></i> </a></td>
        </tr>";
           
        
         }
         ?> 
         </tbody>
    </table>
    