<?php

include 'components/connecting.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';


?>


   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      body{
   background-image: url('vivid.jpg');
   background-repeat: round;
   
}
   </style>

</head>
<body>
   
<?php include 'components/user_header.php'; ?>



<section class="products" style="padding-top: 3; min-height:150vh;">

<h1 class="heading">latest products</h1>

   <div class="box-container">

   <?php
     if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
     $search_box = $_POST['search_box'];
     $select_products = $conn->prepare("SELECT * FROM `mskin_prod` WHERE name LIKE '%{$search_box}%'"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">

      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>₹</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <div class="button-row">

      <button type="submit" name="add_to_wishlist" value="add to wishlist" class="button">wishlist</i></button>
      <button type="submit" name="add_to_cart" value="add to cart"  class="button"> Buy Now</button>
</div>
<?php
         }
      }
      elseif(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
        $warning_msg[] = 'result not found!';

      }else{
         $error_msg[]="no products added yet!";
      }
   ?>
   
   </div>

</section>
    
<style>
body {
 font-family: Arial, sans-serif;
}

.button-row {
 display: flex;
 justify-content: center;
 gap: 10px;
 margin-top: 20px;
}

.button {
 text-decoration: none;
 padding: 9px 30px;
 background: blue;
 color: white;
 transition: background-color 0.3s ease, color 0.3s ease;
 font-size: 16px;
 font-style: italic;
 font-feature-settings: normal;
 font-weight: bolder;
 
}
.more-btn {
 text-decoration: none;
 padding: 4px 680px;
 color: white;
 transition: background-color 0.3s ease, color 0.3s ease;
 font-size: 16px;
 font-style: italic;
 font-feature-settings: normal;
 font-weight: bolder;
 margin-left: 5rem;
margin-top: -5rem;
}

.button:hover {
 background-color: #2980b9;
 color: #fff;
}

.cart-btn {
 background-color: #3498db;
 color: white;
 border: none;
 padding: 10px 20px;
 font-size: 16px;
 cursor: pointer;
 transition: background-color 0.3s ease-in-out;
 margin-top: 10px; /* Add some margin for spacing */
}

.cart-btn:hover {
 background-color: #2980b9;
}
</style>
   </form>
   <?php
         
      }else{
         $warning_msg[] = 'no products found!';
   }
   ?>

   </div>

</section>



<?php include 'components/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<?php include 'components/message.php'; ?>

<script src="js/script.js"></script>

</body>
</html>