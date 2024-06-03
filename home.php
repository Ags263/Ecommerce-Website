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

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" referrerpolicy="no-referrer" />

   <!-- Swiper JS CSS-->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <!-- Scroll Reveal -->
    <link rel="stylesheet" href="css/scrollreveal.min.js">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/faqsty.css">
   <link rel="stylesheet" href="asa.css">
   

<style>
img{
	border-style:none;
}

body{
   background-image: url('vivid.jpg');
   background-repeat: round;
   
}


  .div1{
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 6px 2px black;
    transition: 0.3s;
}
.div1:hover{
    transform:scale(1.01);
    box-shadow:0px 0px 2px 7px gold;
    transition: 0.3s;
}


.promotion {
    padding: 15px;
}

.promotion [class*="col-"] {
    padding: 15px;
    display: -webkit-inline-box;
}

.promotion-box {
    display: flex;
    background-color: transparent;
    position: sticky;
}

.promotion-box .text {

    padding: 20px;
}

.promotion-box .text h3 {
    font-size: 25px;
}

.promotion-box .text button {
    margin-top: 30px;
}

.promotion-box img {
    width: 150px;
    transition: transform 0.3s ease-in-out;
}

.promotion-box:hover img {
    transform: scale(1.1);
}

.btn-flat {
    display: inline-block;
    border: 2px solid var(--btn-border-color);
    background-color: var(--btn-bg);
    color: var(--btn-color);
    padding: 35px 35px;
    font-size: 15px;
    outline: 0;
    font-weight: 600;
    text-transform: uppercase;
}

.btn-hover {
    transition: all 0.3s ease-in-out;
}

.btn-hover:hover {
    background-color: var(--btn-color);
    color: var(--btn-bg);
}


.brand .brand-container h1{
   font-size: 50px;
   text-align: center;
}



</style>
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home" style="max-width:1900px";>

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide" >
         <div class="image">
            <img src="images/img1.png" alt="">
         </div>
         <div class="content">
            <span></span>
            <h3>latest products</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         
         <div class="content">
            <span></span>
            <h3>plant based products</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
         <div class="image">
            <img src="images/beaaa.png" alt="">
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/oila.png" alt="">
         </div>
         <div class="content">
            <span>upto 20% off</span>
            <h3>natural products</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>
</div>
<section>
    <!-- promotion section -->
    <div class="promotion">
        <div class="row">
            <div class="col-4 ">
                <div class="promotion-box">
                    <div class="text">
                        <h3> Acne , Pimples Products</h3>
                        <a href="category.php?category=acne" class="btn-flat btn-hover"><span>shop</span></a>
                    </div>
                    <img src="images/img1.png"  alt="">
                </div>
            </div>
            <div class="col-4 ">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Oil Face Solutions</h3>
                        <a href="category.php?category=acne" class="btn-flat btn-hover"><span>shop</span></a>
                    </div>
                    <img src="images/niv.png" alt="">
                </div>
            </div>
            <div class="col-4 ">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Anti - Aging Products</h3>
                        <a href="category.php?category=acne" class="btn-flat btn-hover"><span>shop</span></a>
                    </div>
                    <img src="images/beaaa.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- end promotion section -->
<section class="category">
   <h1 class="heading"> Our <span> Category</span> </h1>

  

   <div class="box-container">
   <div class="div1">
      <div class="box">
         <img src="images/ss.png" alt="">
         <a href="category.php?category=acne" style="--clr:#ffd700 " class="btn">Acne Care</a>
      </div>
    </div>
     <div class="div1">
      <div class="box">
         <img src="images/beas.png" alt="">
         <a href="category.php?category=razor" style="--clr:#ffd700 " class="btn">Razor Relief</a>
      </div>
      </div>
      <div class="div1">
      <div class="box">
         <img src="images/age.png" alt="">
         <a href="category.php?category=anti" style="--clr:#ffd700 " class="btn">Anti-Aging </a>
      </div>
      </div>
      <div class="div1">
      <div class="box">
         <img src="images/d.png" alt="">
         <a href="category.php?category=beard" style="--clr:#ffd700 " class="btn"> Beard Care</a>
      </div>
      </div>
      <div class="div1">
      <div class="box">
         <img src="images/oil.png" alt="">
         <a href="category.php?category=oil" style="--clr:#ffd700 " class="btn">Oily Skin </a>
      </div>
      </div>
    
      
      
</div>
      

</section>



<section class="home-products" style="max-width:1900px width:50rem";>

   <h1 class="heading"> Best Products </h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `mskin_prod` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      
      <div class="name"><?= $fetch_product['name']; ?></div>
      
      <div class="flex">
         <div class="price">₹ <?= $fetch_product['price']; ?><span> /-</span></div>
         
         <input type="number" name="qty" class="qty" min="1" max="99" maxlength="2" value="1">
         
      </div>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>

      <div class="button-row">

   <button type="submit" name="add_to_wishlist" value="add to wishlist" class="button"> Wishlist</button>
   <button type="submit" name="add_to_cart" value="add to cart"  class="button"> Buy Now</button>
 </div>
  
        </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>
   
   </div>
   <div class="more-btn">
      <a href="shop.php" class="btn">Shop All Products</a>
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
  
   <div class="swiper-pagination"></div>
  </section>
 
  <style>
    
    .swiper-slide {
   text-align: center;
   font-size: 18px;
   /* background: #fff; */
 
   /* Center slide text vertically */
   flex-direction: column;
   display: -webkit-box;
   display: -ms-flexbox;
   display: -webkit-flex;
   display: flex;
   -webkit-box-pack: center;
   -ms-flex-pack: center;
   -webkit-justify-content: center;
   justify-content: center;
   -webkit-box-align: center;
   -ms-flex-align: center;
   -webkit-align-items: center;
   align-items: center;
   margin-bottom: 5rem;
 }
 .icons-container{
   background: transparent;
   display: flex;
   flex-wrap: wrap;
   gap: 2.5rem;
   padding-top: 5rem;
   padding-bottom: 5rem;
}

.icons-container .icons{
   background: ;
   flex-direction: column;
   justify-content: space-between;
   padding: 2rem;
   display: flex;
   align-items: center;
   flex: 1 1 25rem;
}
.icons-container .icons h2{
   color: blue;
   padding-bottom: .5rem;
   font-size: 3rem;
   text-align: center;
}
.icons-container .icons span{
   color: black;
   font-size: 1.7rem;
   gap: 3rem;
   padding:3rem;
   text-align: center;
}

  </style>
  <section class="about" id="about">


<h1 class="heading"> Why Shop with our website ? </h1>




<div class="icons-container">

<div class="icons">
  <img src="images/feature-1.png" alt="">
  <div class="info">
    <h2>Guaranteed PURE</h2>
    <span>I HAVE A GREAT EXPIRENCE WITH THIS WEBITE AFTER USING THIS PRODUCTS MY 
      SKIN PROBLEMS WERE REDUCED LITTLE BY LITTLE,NOW MY SKIN CLEAN AND LESS PRONE 
      TO SKIN ISSUE.</span>
</div>
</div>

<div class="icons">
  <img src="images/feature-2.png" alt="">
  <div class="info">
    <h2>Completely Cruelty-Free</h2>
    <span>I HAVE A GREAT EXPIRENCE WITH THIS WEBITE AFTER USING THIS PRODUCTS MY 
      SKIN PROBLEMS WERE REDUCED LITTLE BY LITTLE,NOW MY SKIN CLEAN AND LESS PRONE 
      TO SKIN ISSUE.</span>
</div>
</div>

<div class="icons">
  <img src="images/feature-3.png" alt="">
  <div class="info">
    <h2>Ingredient Sourcing</h2>
    <span> I HAVE A GREAT EXPIRENCE WITH THIS WEBITE AFTER USING THIS PRODUCTS MY 
      SKIN PROBLEMS WERE REDUCED LITTLE BY LITTLE,NOW MY SKIN CLEAN AND LESS PRONE 
      TO SKIN ISSUE.</span>
</div>
</div>


</div>
</section>







   <section class="brand">
            <div class="brand-container">

              <h1 class="heading"> Our trusted partner </h1>
                    <h4 class="section-subtitle"></h4>

                    <div class="brand-images">
                            <div class="brand-image">
                                    <img src="images/mama.png" alt="" class="brand-img">
                            </div>
                            <div class="brand-image">
                                    <img src="images/beard.png" alt="" class="brand-img">
                            </div>
                            <div class="brand-image">
                                    <img src="images/man.png" alt="" class="brand-img">
                            </div>
                            <div class="brand-image">
                                    <img src="images/Neem.png" alt="" class="brand-img">
                            </div>
                            <div class="brand-image">
                                    <img src="images/KAM.png" alt="" class="brand-img">
                            </div>
                            <div class="brand-image">
                                    <img src="images/Soul.png" alt="" class="brand-img">
                            </div>
                    </div>
            </div>
        </section>
        

   <section class="faq" id="faq">
    <div class="heading">
      <h1 class="heading"> Frequently Asked Questions</h1>
    </div>

    <div class="accordion-container">

      <div class="accordioncare"> 

      <div class="accordion-heading">
        <h3> 1. Why is a skincare routine important for men? </h3>
        <i class="fas fa-angle-down"></i>
      </div>

      <p class="accordion-content">
      It is a Latin text that has no meaning, but it is visually appealing and easy to read. However, it is not plagiarism-free, as it is still a copy of another source.
      </p>
      </div>

      <div class="accordioncare"> 
      <div class="accordion-heading">
        <h3> 1. Why is a skincare routine important for men? </h3>
        <i class="fas fa-angle-down"></i>
      </div>

      <p class="accordion-content">
      I HAVE A GREAT EXPIRENCE WITH THIS WEBITE AFTER USING THIS PRODUCTS MY SKIN PROBLEMS WERE REDUCED LITTLE BY LITTLE,NOW MY SKIN CLEAN AND LESS PRONE TO SKIN ISSUE.
      </p>
      </div>

      <div class="accordioncare"> 
      <div class="accordion-heading">
        <h3> 1. Why is a skincare routine important for men? </h3>
        <i class="fas fa-angle-down"></i>
      </div>

      <p class="accordion-content">
      I HAVE A GREAT EXPIRENCE WITH THIS WEBITE AFTER USING THIS PRODUCTS MY SKIN PROBLEMS WERE REDUCED LITTLE BY LITTLE,NOW MY SKIN CLEAN AND LESS PRONE TO SKIN ISSUE.
      </p>
      </div>

     
    </div>


  </section>
  <script>
    document.querySelectorAll('.faq .accordion-container .accordioncare').forEach(accordioncare =>{
   accordioncare.onclick = () =>{
      accordioncare.classList.toggle('active');
   }

});
  </script>


<section class="section section-testimonial ">
        <div class="container">
          <h1 class="heading">Happy Client works</h1>
          
        </div>
          <!-- Slider main container -->
          <!-- Swiper -->
    <div class="swiper mySwiper container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p> I HAVE A GREAT EXPIRENCE WITH THIS WEBITE AFTER USING THIS PRODUCTS MY SKIN PROBLEMS WERE REDUCED LITTLE BY LITTLE,NOW MY SKIN CLEAN AND LESS PRONE TO SKIN ISSUE.</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img loading="lazy" src="images/gorak.png" alt="">
            </figure>
            <div class="client-data-details">
              <p>Goraknath</p>
              <p>student</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p> I HAVE A GREAT EXPIRENCE WITH THIS WEBITE AFTER USING THIS PRODUCTS MY SKIN PROBLEMS WERE REDUCED LITTLE BY LITTLE,NOW MY SKIN CLEAN AND LESS PRONE TO SKIN ISSUE. </p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img loading="lazy" src="images/san.png" alt="">
            </figure>
            <div class="client-data-details">
              <p>sanjeev</p>
              <p>Friend</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p>I HAVE A GREAT EXPIRENCE WITH THIS WEBITE AFTER USING THIS PRODUCTS MY SKIN PROBLEMS WERE REDUCED LITTLE BY LITTLE,NOW MY SKIN CLEAN AND LESS PRONE TO SKIN ISSUE.</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img loading="lazy" src="images/shi.png" alt="">
            </figure>
            <div class="client-data-details">
              <p>Vda</p>
              <p>Entrepruner</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p>I HAVE A GREAT EXPIRENCE WITH THIS WEBITE AFTER USING THIS PRODUCTS MY SKIN PROBLEMS WERE REDUCED LITTLE BY LITTLE,NOW MY SKIN CLEAN AND LESS PRONE TO SKIN ISSUE.</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img loading="lazy" src="images/p s.png" alt="">
            </figure>
            <div class="client-data-details">
              <p>Group</p>
              <p>Worker</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p>I HAVE A GREAT EXPIRENCE WITH THIS WEBITE AFTER USING THIS PRODUCTS MY SKIN PROBLEMS WERE REDUCED LITTLE BY LITTLE,NOW MY SKIN CLEAN AND LESS PRONE TO SKIN ISSUE.</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img src="images/mok.png" alt="">
            </figure>
            <div class="client-data-details">
              <p>jni</p>
              <p>mokal</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         
       
      </div>
      <div class="swiper-pagination"></div>
    </div>
        </div>
    </section>


<?php include 'components/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<?php include 'components/message.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>
<script src="js/home.js"></script>
<script>


var swiper = new Swiper(".home-slider", {
      slidesPerView: 1,
      spaceBetween: 50,
      autoplay: {
         delay: 1600,
         disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    
var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 30,
      autoplay: {
         delay: 1900,
         dusableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>