<?php

include '../components/connecting.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['update'])){

   $pid = $_POST['pid'];
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);

   $update_product = $conn->prepare("UPDATE `mskin_prod` SET name = ?, price = ?, category = ? WHERE id = ?");
   $update_product->execute([$name, $price, $category, $pid]);

   $success_msg[] = 'product is updated successfully!';

   $old_image_01 = $_POST['old_image_01'];
   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = '../uploaded_img/'.$image_01;

   if(!empty($image_01)){
      if($image_size_01 > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $update_image_01 = $conn->prepare("UPDATE `mskin_prod` SET image_01 = ? WHERE id = ?");
         $update_image_01->execute([$image_01, $pid]);
         move_uploaded_file($image_tmp_name_01, $image_folder_01);
         unlink('../uploaded_img/'.$old_image_01);
         $success_message[] = 'image  updated successfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>update product</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">
   <style>
            body{
   background-color: var(--light-bg);
   margin-left: 28rem;
   margin-top: 6rem;
}
.up-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.up-table th,
.up-table td {
    padding: 10px;
    text-align: center;
    font-size: 18px; /* Increased font size */
    border: 1px solid #ccc;
}

.up-table th {
    background-color: #007bff;
    color: #fff;
}

.up-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.up-table tbody tr:hover {
    background-color: #ddd;
}

.update-product form{
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
   border:var(--border);
   padding:2rem;
   max-width: 50rem;
   margin:0 auto;
}

.update-product form .image-container{
   margin-bottom: 2rem;
}

.update-product form .image-container .main-image img{
   height: 20rem;
   width: 100%;
   object-fit: contain;
}

.update-product form .image-container .sub-image{
   display: flex;
   gap:1rem;
   justify-content: center;
   margin:1rem 0;
}

.update-product form .image-container .sub-image img{
   height: 5rem;
   width: 7rem;
   object-fit: contain;
   padding:.5rem;
   border:var(--border);
   cursor: pointer;
   transition: .2s linear;
}

.update-product form .image-container .sub-image img:hover{
   transform: scale(1.1);
}

.update-product form .box{
   width: 100%;
   border-radius: .5rem;
   padding:1.4rem;
   font-size: 1.8rem;
   color:var(--black);
   background-color: var(--light-bg);
   margin:1rem 0;
}

.update-product form span{
   font-size: 1.7rem;
   color:var(--light-color);
}

.update-product form textarea{
   height: 15rem;
   resize: none;
}

   </style>

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="update-product">

   <h1 class="heading">update product</h1>

   <?php
      $update_id = $_GET['update'];
      $select_products_m = $conn->prepare("SELECT * FROM `mskin_prod` WHERE id = ?");
      $select_products_m->execute([$update_id]);
      if($select_products_m->rowCount() > 0){
         while($fetch_products_m= $select_products_m->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="pid" value="<?= $fetch_products_m['id']; ?>">
      <input type="hidden" name="old_image_01" value="<?= $fetch_products_m['image_01']; ?>">

      <div class="image-container">
         <div class="main-image">
            <img src="../uploaded_img/<?= $fetch_products_m['image_01']; ?>" alt="">
         </div>
         </div>
      <span>update name</span>
      <input type="text" name="name" required class="box" maxlength="100" placeholder="enter product name" value="<?= $fetch_products_m['name']; ?>">
      <span>update price</span>
      <input type="number" name="price" required class="box" min="0" max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" value="<?= $fetch_products_m['price']; ?>">
      <span>update category</span>
      <select name="category" class="box" required>
         <option value="" disabled selected>-- select your category --</option>
         <option value="acne">Acne Care</option>
         <option value="razor">Razor Relief</option>
         <option value="beard">Beard Care</option>
         <option value="oil"> Oily Skin control</option>
         <option value="anti">Anti-Aging</option>

         
         
      </select>

      <span>update image 01</span>
      <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      
         <input type="submit" name="update" class="btn" value="update">
         <a href="products.php" class="option-btn">go back</a>
      </div>
   </form>
   
   <?php
         }
      }else{
         echo '<p class="empty">no product found!</p>';
      }
   ?>

</section>
<?php include '../components/admin_header.php'; ?>

<section class="up" style=" padding: 3rem; max-width: 1790px; margin: -5px auto;";>


   <table class="up-table">
      <thead>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php
            $select_products_m = $conn->prepare("SELECT * FROM `mskin_prod`");
            $select_products_m->execute();
            if ($select_products_m->rowCount() > 0) {
                $serialNumber = 1; // Initialize a serial number counter
                while ($fetch_products_m = $select_products_m->fetch(PDO::FETCH_ASSOC)) {
                  echo '<tr>';
                    echo '<td>' . $serialNumber . '</td>'; // Display the serial number
                    echo '<td>' . $fetch_products_m['name'] . '</td>';
                    echo '<td>' . $fetch_products_m['price'] . '</td>';
                    echo '<td>' . $fetch_products_m['category'] . '</td>';

                    echo '<td><img src="../uploaded_img/' . $fetch_products_m['image_01'] . '" alt="" width="100"></td>';
                    echo '<td>
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

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>
</body>
</html>