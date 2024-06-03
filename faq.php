<?php

include 'components/connecting.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

  <title>Document</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/faqsty.css">
   
   <style>
body{
   background-image: url('vivid.jpg');
   background-repeat: round;
   
}
   </style>
</head>
<body>

<?php include 'components/user_header.php'; ?>
  <section class="faq" id="faq">
    <div class="heading">
      <span>FAQ</span>
      <h1>question & answers </h1>
    </div>

    <div class="accordion-container">

      <div class="accordioncare"> 

      <div class="accordion-heading">
        <h3>  Why is a skincare routine important for men? </h3>
        <i class="fas fa-angle-down"></i>
      </div>

      <p class="accordion-content">
      A skincare routine helps maintain healthy skin by preventing issues like acne, premature aging, and dryness. 
      It also boosts confidence and promotes self-care.
      </p>
      </div>

      <div class="accordioncare"> 
      <div class="accordion-heading">
        <h3>  What are the basic steps in a men's skincare routine? </h3>
        <i class="fas fa-angle-down"></i>
      </div>

      <p class="accordion-content">
        It is a Latin text that has no meaning, but it is visually 
        appealing and easy to read. However, it is not plagiarism-free,
         as it is still a copy of another source.
      </p>
      </div>

      <div class="accordioncare"> 
      <div class="accordion-heading">
        <h3>  Can men use the same skincare products as women? </h3>
        <i class="fas fa-angle-down"></i>
      </div>

      <p class="accordion-content">
      It is a Latin text that has no meaning, but it is visually 
        appealing and easy to read. However, it is not plagiarism-free,
         as it is still a copy of another source.

      </p>
      </div>

      <div class="accordioncare"> 
      <div class="accordion-heading">
        <h3>  Should I consult a dermatologist for my skincare routine?  </h3>
        <i class="fas fa-angle-down"></i>
      </div>

      <p class="accordion-content">
      It is a Latin text that has no meaning, but it is visually 
        appealing and easy to read. However, it is not plagiarism-free,
         as it is still a copy of another source.
      </p>
      </div>

      <div class="accordioncare"> 
      <div class="accordion-heading">
        <h3>  How can I prevent razor burns and ingrown hairs? </h3>
        <i class="fas fa-angle-down"></i>
      </div>

      <p class="accordion-content">
      It is a Latin text that has no meaning, but it is visually 
        appealing and easy to read. However, it is not plagiarism-free,
         as it is still a copy of another source.
      </p>
      </div>

    </div>


  </section>
  <script>
    document.querySelectorAll('.faq .accordion-container .accordioncare').forEach(accordion =>{
   accordion.onclick = () =>{
      accordion.classList.toggle('active');
   }

});
  </script>

</body>
</html>
