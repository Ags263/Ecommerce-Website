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
   <title>shop</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      body{
   background-image: url('vivid.jpg');
   background-repeat: round;
   
}
      
.p-category{
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
   gap:1.5rem;
   justify-content: center;
   align-items: flex-start;
}

.p-category{
   padding-bottom: 0;
}

.p-category a{
   padding:1.5rem;
   text-align: center;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
   font-size: 2rem;
   text-transform: capitalize;
   color:var(--black);
}

.p-category a:hover{
   background-color: var(--black);
   color: var(--white);
}
   </style>

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="p-category">

   <a href="category.php?category=acne">Acne Care Products</a>
   <a href="category.php?category=razor">Razor Relief  Products</a>
   <a href="category.php?category=anti">Anti-Aging Products</a>
   <a href="category.php?category=oil">Oily skin Products</a>
   <a href="category.php?category=beard">Beard Care Products</a>

</section>

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

   <?php
     $select_products_mskin = $conn->prepare("SELECT * FROM `mskin_prod`"); 
     $select_products_mskin->execute();
     if($select_products_mskin->rowCount() > 0){
      while($fetch_product_m = $select_products_mskin->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product_m['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product_m['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product_m['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product_m['image_01']; ?>">

      <img src="uploaded_img/<?= $fetch_product_m['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product_m['name']; ?></div>
      <div class="flex">
         <div class="price"> <i class="fa fa-inr" aria-hidden="true"></i><?= $fetch_product_m['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
      
         <span>( 250 )</span>
      </div>

      <div class="button-row">
   

   <button type="submit" name="add_to_wishlist" value="add to wishlist" class="button"> WISH</button>
   <button type="submit" name="add_to_cart" value="add to cart"  class="button"> Buy</button>
  
 </div>
  
        </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>
   
   </div>

  </div>
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
    background: linear-gradient(to right, #c72092 , #6c14d0);
    color: white;
    transition: background-color 0.3s ease, color 0.3s ease;
    font-size: 16px;
    font-style: italic;
    font-feature-settings: normal;
    font-weight: bolder;
    
  }

  .button:hover {
    background-color: black;
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
  
   <div class="swiper-pagination"></div>
  </section>













<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>