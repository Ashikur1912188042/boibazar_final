
    <h3 class="text-center text-success"> All Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info text-center">
            <tr>
                <th>Serial No</th>
                <th>Due Amount</th>
                <th>Invoice Number</th>
                <th>Total Products</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

        </tbody class="bg-secondary text-light">
<?php
         $get_orders= "Select * from `user_orders`";
         $result=mysqli_query($con, $get_orders);
         $number=0;
         while($row=mysqli_fetch_assoc($result)){
            
            $user_id=$row['user_id'];
            $amount_due=$row['amount_due'];
            $invoice_number=$row['invoice_number'];
            $total_products=$row['total_products'];
            $order_date=$row['order_date'];
            $order_status=$row['order_status'];
            $number++;
?>
            <tr class='bg-secondary text-light text-center'>
            <td><?php echo $number ?></td>
            <td><?php echo $amount_due ?></td>
            <td><?php echo $invoice_number ?></td>
            <td><?php echo $total_products ?></td>
            <td><?php echo $order_date ?></td>
            <td><?php echo $order_status ?></td>

            
            <td><a href='' class='text-light'> <i class='fa-solid fa-trash'></i> </a></td>
        </tr>
           
        
        <?php
    
            }
         ?> 
         </tbody>
    </table>
    
