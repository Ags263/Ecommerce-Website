<?php
include '../components/connecting.php';
session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
   header('location:admin_login.php');
}
if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);

   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = '../uploaded_img/'.$image_01;


   $select_products = $conn->prepare("SELECT * FROM `mskin_prod` WHERE name = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $warning_msg[] = 'product name already exist!';
   }else{

      $insert_products = $conn->prepare("INSERT INTO `mskin_prod`(name, category, price, image_01) VALUES(?,?,?,?)");
      $insert_products->execute([$name, $category, $price, $image_01]);

      if($insert_products){
         if($image_size_01 > 2000000  ){
            $warning_msg[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
         }

      }

   }  

};
if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `mskin_prod` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('../images/'.$fetch_delete_image['image_01']);
   $delete_product = $conn->prepare("DELETE FROM `mskin_prod` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `mskin_cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `mskin_wish` WHERE pid = ?");
   $delete_wishlist->execute([$delete_id]);
   
   if($delete_product->rowCount() > 0){
      $delete_product = $conn->prepare("DELETE FROM `mskin_prod` WHERE id = ?");
      $delete_product->execute([$delete_id]);
      $success_msg[] = 'Product deleted!';
   }else{
      $warning_msg[] = 'Product deleted already!';
   }

}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="../css/search.css">
   <style>
      body{
   background-color: var(--light-bg);
   margin-left: 28rem;
   margin-top: 6rem;
}
.prod-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.prod-table th,
.prod-table td {
    padding: 10px;
    text-align: center;
    font-size: 18px; /* Increased font size */
    border: 1px solid #ccc;
}

.prod-table th {
    background-color: #007bff;
    color: #fff;
}

.prod-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}




   </style>

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="add-products">

   <h1 class="heading">Add product</h1>


   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>product name*</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name">
         </div>
         <div class="inputBox">
            <span>product price*</span>
            <input type="number" min="10" class="box" required max="99999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
         </div>
         <select name="category" class="box" required>
         <option value="" disabled selected>-- select your category --</option>
         <option value="acne">Acne Care</option>
         <option value="razor">Razor Relief</option>
         <option value="beard">Beard Care</option>
         <option value="oil"> Oily Skin control</option>
         <option value="anti">Anti-Aging</option>

      </select>
        <div class="inputBox">
            <span>image 01*</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>

        </div>
         <div class="inputBox">

      </div>
      
      <input type="submit" value="add product" class="btn" name="add_product">
   </form>

</section>

<section class="prod" style=" padding: 3rem; max-width: 1790px; margin: -5px auto;";>
    <h1 class="heading">Products Added</h1>
    <table class="prod-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $select_products = $conn->prepare("SELECT * FROM `mskin_prod`");
            $select_products->execute();
           if ($select_products->rowCount() > 0) {
               $serialNumber = 1; // Initialize a serial number counter
               while ($fetch_products_m = $select_products->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $serialNumber . '</td>'; // Display the serial number
                    echo '<td>' . $fetch_products_m['name'] . '</td>';
                    echo '<td>' . $fetch_products_m['price'] . '</td>';
                    echo '<td>' . $fetch_products_m['category'] . '</td>';

                    echo '<td><img src="../uploaded_img/' . $fetch_products_m['image_01'] . '" alt="" width="100"></td>';
                    echo '<td>
                            <a href="update_product.php?update=' . $fetch_products_m['id'] . '" class="option-btn">Update</a>
                            <a href="products.php?delete=' . $fetch_products_m['id'] . '" class="delete-btn" onclick="return confirm(\'Delete this product?\');">Delete</a>
                          </td>';
                    echo '</tr>';
                    $serialNumber++; // Increment the serial number for the next row
                }
            } else {
                echo '<tr><td colspan="6" class="empty">No products found</td></tr>';
            }
            ?>
        </tbody>
    </table>
</section>


                  



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include '../components/message.php'; ?>




<script src="../js/admin_script.js"></script>
   
</body>
</html>