<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Order</title>
</head>
<body>
        <?php  
        $username= $_SESSION['username'];
        $get_user="Select * from `user_table` where username='$username'";
        $result=mysqli_query($con, $get_user);
        $row_fetch=mysqli_fetch_assoc($result);
        $user_id=$row_fetch['user_id'];

        ?>
    <h3 class="text-success">All my Orders</h3>
    <table class="table table-bordered mt-5 m-auto">
        <thead class="bg-info">
            <tr>
                <th>S1 no </th>
                <th>Amount Due </th>
                <th>Total Product </th>
                <th>Invoice Number </th>
                <th>Date </th>
                <th>Complete/Incomplete </th>
                <th>Status </th>

            </tr>
        </thead>
        
        <tbody class="bg-secondary text-light">

        <?php
            $get_order_details="Select * from `user_orders` where user_id='$user_id'";
            $result_order=mysqli_query($con, $get_order_details);
            while($row_orders=mysqli_fetch_assoc($result_order)){
                $order_id=$row_orders['order_id'];
                $amount_due=$row_orders['amount_due'];
                $total_products=$row_orders['total_products'];
                $invoice_number=$row_orders['invoice_number'];
                $order_date=$row_orders['order_date'];
                $order_status=$row_orders['order_status'];
                if($order_status=='pending'){
                    $order_status='Incomplete';
                }else{
                    $order_status='Complete';
                }
                $order_date=$row_orders['order_date'];
                $number=1;
                echo"<tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>";
                        ?>
                        <?php
                        if($order_status=='Complete'){
                            echo"<td>Paid</td>";
                        }else{
                            echo"<td>< href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</
                            a></td>                     
                            </tr>";
                        }               
                $number++;
            }
        ?>
            
        </tbody>

    </table>
    
</body>
</html>