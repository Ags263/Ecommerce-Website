<?php

include 'components/connecting.php';

if(isset($_COOKIE['user_id'])){
  $user_id = $_COOKIE['user_id'];
}else{
  $user_id = '';
}

?>


   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
  body{
   background-image: url('vivid.jpg');
   background-repeat: round;
   
}
.heading{
   font-size: 4rem;
   color:var(--black);
   margin-bottom: 2rem;
   text-align: center;
   text-transform: uppercase;
}
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
}
.icons-container .icons span{
   color: black;
   font-size: 1.7rem;
   gap: 3rem;
   padding:3rem;
}


 </style>
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about" id="about">

<h1 class="heading"> why choose us</h1>

   <div class="row">

      <div class="image">
         <img src="images/asf.png" alt="">
      </div>

      <div class="content">
         <h3 class="title">why mens love our products</h3>
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa alias architecto sequi nemo sed necessitatibus deleniti iusto facilis laudantium 
          praesentium iste eaque qui, ut tempora esse ratione. Impedit, et obcaecati?</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>


<div class="icons-container">

<div class="icons">
  <img src="images/icon.png"  style="width:200px"; alt="">
  <div class="info">
    <h2>Free Delivery</h2>
    <span>on all order</span>
</div>
</div>

<div class="icons">
  <img src="images/icon0.png" style="width:190px"; alt="">
  <div class="info">
    <h2>15 Days Return</h2>
    <span>moneyback gaurantee</span>
</div>
</div>

<div class="icons">
  <img src="images/icon1.png" style="width:190px"; alt="">
  <div class="info">
    <h2>gifts and more</h2>
    <span>on all order</span>
</div>
</div>

<div class="icons">
  <img src="images/icon2.png" style="width:190px"; alt="">
  <div class="info">
    <h2>100% chemical free</h2>
    <span>on all products</span>
</div>
</div>
</section>


 <!-- ======================================== 
          Our Testimonial Section Start  
    ========================================  -->

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
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo eaque rem deleniti quo fugit error facilis ad fuga laborum? Itaque rerum totam commodi fugiat! Ullam voluptates cumque quisquam sit vitae!</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img loading="lazy" src="images/gorak.png" alt="">
            </figure>
            <div class="client-data-details">
              <p>Goraknath</p>
              <p>Student</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p>"I've tried several skincare websites, but this one stands out! The products are top-notch, and the website is so easy to navigate. I love the detailed product descriptions and the useful skincare tips. Plus, the checkout process was a breeze. Highly recommended!"</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img loading="lazy" src="images/ga.png" alt="">
            </figure>
            <div class="client-data-details">
              <p>Vinod thapa</p>
              <p>Entrepruner</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p>I'm new to skincare, and this website made it easy for me to find what I needed. The product categories helped me narrow down my choices, and I appreciated the beginner's guide to skincare. The only thing I'd suggest is adding more budget-friendly options.</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img loading="lazy" src="images/san.png" alt="">
            </figure>
            <div class="client-data-details">
              <p>Vinod thapa</p>
              <p>Entrepruner</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p>I ordered a few skincare products from this website, and I was impressed with how quickly they arrived. The packaging was secure, and the products were exactly as described. I'll definitely be shopping here again!</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img loading="lazy" src="images/kadak.png" alt="">
            </figure>
            <div class="client-data-details">
              <p>Vinod thapa</p>
              <p>Entrepruner</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p>I had a question about one of the products, so I reached out to customer service via chat. They responded promptly and were very helpful. The only reason I didn't give 5 stars is that the website could use more product reviews from customers like me.</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img src="images/ps.png" alt="">
            </figure>
            <div class="client-data-details">
              <p>Vinod thapa</p>
              <p>Entrepruner</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p>This website has a sleek and modern design, and I had no trouble finding the skincare items I was looking for. I also appreciate the blog section with skincare tips and trends. It's become my go-to place for skincare products</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img src="images/clients/f.jpg" alt="">
            </figure>
            <div class="client-data-details">
              <p>Vinod thapa</p>
              <p>Entrepruner</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p>The website offers a great variety of skincare brands and products. However, I'd love to see more information about the ingredients used in each product. Transparency about ingredients is essential for skincare.</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img src="images/clients/g.jpg" alt="">
            </figure>
            <div class="client-data-details">
              <p>Vinod thapa</p>
              <p>Entrepruner</p>
            </div>
          </div>
        </div>
        <!-- slide end  -->
         <div class="swiper-slide">
        
          <div class="swiper-client-msg">
            <p>I often shop on my phone, and this website is very mobile-friendly. It loads quickly, and the layout adapts well to my screen size. It's a big plus for me!</p>
          </div>
          <div class="swiper-client-data grid grid-two-col ">
            <figure>
            <img src="images/clients/h.jpg" alt="">
            </figure>
            <div class="client-data-details">
              <p>Vinod thapa</p>
              <p>Entrepruner</p>
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

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
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

</script>

</body>
</html>