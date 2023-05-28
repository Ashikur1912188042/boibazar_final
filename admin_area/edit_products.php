<?php 
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="Select * from `products` where product_id='$edit_id'";
    $result_data=mysqli_query($con, $get_data);
    $row=mysqli_fetch_assoc($result_data);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    $status=$row['status'];

    // Fetching category name
    $select_category="Select * from `categories` where category_id='$category_id'";
    $result_category=mysqli_query($con, $select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];

    // Fetching brand name
    $select_brand="Select * from `brands` where brand_id='$brand_id'";
    $result_brand=mysqli_query($con, $select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];



}


?>



<div class="container mt-5">
    <h1 class="text-center"> Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" value=<?php echo $product_title ?> class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" name="product_description" value=<?php echo $product_description ?> class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" value=<?php echo $product_keywords ?> class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Category</label>
        <select name="product_category" class="form-select">
        <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
<?php 
            $select_category_all="Select * from `categories`";
            $result_category_all=mysqli_query($con, $select_category_all);
            while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                $category_title=$row_category_all['category_title'];
                $category_id=$row_category_all['category_id'];
                echo"<option value=''>$category_title</option>$category_title</option>";
            };
?>
        </select>           
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brand" class="form-label">Product Brands</label>
        <select name="product_brand" class="form-select">
        <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
<?php 
            $select_brand_all="Select * from `brands`";
            $result_brand_all=mysqli_query($con, $select_brand_all);
            while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                $brand_title=$row_brand_all['brand_title'];
                $brand_id=$row_brand_all['brand_id'];
                echo"<option value='$brand_title'>$brand_title</option>$brand_title</option>";
            };
?>
        </select>           
        </div>
        <div class="form-outline w-50 m-auto mb-4 d-flex">
            <label for="product_image1" class="form-label">Product Image1</label>
            <input type="file" id="product_image1" name="product_image1" class="form-control" required="required">
            <img src="./product_images/<?php echo$product_image1 ?>" alt="" class="prod_image">
        </div>
        <div class="form-outline w-50 m-auto mb-4 d-flex">
            <label for="product_image2" class="form-label">Product Image2</label>
            <input type="file" id="product_image2" name="product_image2" class="form-control" required="required">
            <img src="./product_images/<?php echo$product_image2 ?>" alt="" class="prod_image">
        </div>
        <div class="form-outline w-50 m-auto mb-4 d-flex">
            <label for="product_image3" class="form-label">Product Image3</label>
            <input type="file" id="product_image3" name="product_image3" class="form-control" required="required">
            <img src="./product_images/<?php echo$product_image3 ?>" alt="" class="prod_image">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" value=<?php echo $product_price ?> class="form-control" required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" class="btn btn-info px-3 mb-3" value="Update Product"">
        </div>
        

        
    </form>
</div>


<!-- Editing Product -->

<?php

if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand =$_POST['product_brand'];
    $product_price=$_POST['product_price'];

    //Accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //Accessing images temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];


    //Checking empty condition
    if ($product_title == '' or $product_description == '' or $product_keywords == '' or $product_category == '' or $product_brand == '' or $product_price == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == '') {
        echo "<script> alert('Please fill all the available fields')</script>";
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

       //Query to update product
       $update_product="update `products` set product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords',
       category_id='$product_category',product_id='$product_brand',product_image1='$product_image1',product_image2='$product_image2',
       product_image3='$product_image3',product_price='$product_price',date=NOW() where product_id=$edit_id";

       $result_update_query=mysqli_query($con,$update_product);
        if($result_update_query){
            echo "<script> alert('Successfully Updated')</script>";
            echo "<script> window.open('./view_products.php','_self')</script>";
        }

    }

    

}



?>