<?php

include 'components/connecting.php';

if(isset($_COOKIE['user_id'])){
  $user_id = $_COOKIE['user_id'];
}else{
  $user_id = '';
}

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
    $warning_msg[] = 'message sent already!';
  }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $success_msg[] = 'message send successfully!';

   }

}


?>


   <title>contact</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
         
<style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');


   body{
   background-image: url('vivid.jpg');
   background-repeat: round;
   
}

.container {
  max-width: 1080px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 20px;
  padding-right: 20px;
}

.section-header {
  margin-bottom: 50px;
  text-align: center;
}

.section-header h2 {
  color: orangered;
  font-weight: bold;
  font-size: 3em;
  margin-bottom: 20px;
}

.section-header p {
  color: black;
  font-size: 20px;
}

.row  {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
}

.contact-info {
  width: 50%;
}

.contact-info-item {
  display: flex;
  margin-bottom: 30px;
}

.contact-info-icon {
  height: 70px;
  width: 70px;
  background-color: #fff;
  text-align: center;
  border-radius: 50%;
}

.contact-info-icon i {
  font-size: 30px;
  line-height: 70px;
}

.contact-info-content {
  margin-left: 20px;
}

.contact-info-content h4 {
  color: #1da9c0;
  font-size: 1.4em;
  margin-bottom: 5px;
}

.contact-info-content p {
  color: blueviolet;
  font-size: 2em;
}

.contact-form {
  background-color: skyblue;
  padding: 40px;
  width: 45%;
  padding-bottom: 20px;
  padding-top: 20px;
  border-radius: 30px;
}

.contact-form h2 {
  font-weight: bold;
  font-size: 2em;
  margin-bottom: 10px;
  color: #333;
}

.contact-form .input-box {
  position: relative;
  width: 100%;
  margin-top: 10px;
}

.contact-form .input-box input,
.contact-form .input-box textarea{
  width: 100%;
  padding: 5px 0;
  font-size: 16px;
  margin: 10px 0;
  border: none;
  border-bottom: 2px solid #333;
  outline: none;
  resize: none;
}

.contact-form .input-box span {
  position: absolute;
  left: 0;
  padding: 5px 0;
  font-size: 16px;
  margin: 10px 0;
  pointer-events: none;
  transition: 0.5s;
  color: #666;
}

.contact-form .input-box input:focus ~ span,
.contact-form .input-box textarea:focus ~ span{
  color: #e91e63;
  font-size: 12px;
  transform: translateY(-20px);
}

.contact-form .input-box input[type="submit"]
{
  width: 100%;
  background: #00bcd4;
  color: #FFF;
  border: none;
  cursor: pointer;
  padding: 10px;
  font-size: 18px;
  border: 1px solid #00bcd4;
  transition: 0.5s;
}

.contact-form .input-box input[type="submit"]:hover
{
  background: orangered;
  color: black;
}

@media (max-width: 991px) {
  section {
    padding-top: 50px;
    padding-bottom: 50px;
  }
  
  .row {
    flex-direction: column;
  }
  
  .contact-info {
    margin-bottom: 40px;
    width: 100%;
  }
  
  .contact-form {
    width: 100%;
  }
}
</style>

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section>
    
    <div class="section-header">
      <div class="container">
        <h2>Contact Us</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis dignissimos eaque doloremque, nulla mollitia facilis temporibus ullam voluptas nostrum consequatur? Fugiat vitae sint quo est eveniet perspiciatis eum asperiores ipsam.</p>
      </div>
    </div>
    
    <div class="container">
      <div class="row">
        
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
            <i class="fa-solid fa-address-book fa-beat" style="color: #10dbea;"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Address</h4>
              <p>4671 Sugar Camp Road,<br/> Owatonna, Minnesota, <br/>55060</p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
            <i class="fa-solid fa-phone fa-beat" style="color: #0df8f4;"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Phone</h4>
              <p>561-456-2321</p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
            <i class="fa-solid fa-envelope fa-beat" style="color: #0df8f4;"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Email</h4>
             <p>example@email.com</p>
            </div>
          </div>
        </div>
        
        <div class="contact-form">
          <form action="" method="post">
            <h2>Get In Touch</h2>
            <div class="input-box">
              <input type="text" name="name" placeholder="enter your name"  required maxlength="20" class="box">
              
            </div>
            
            <div class="input-box">
              <input type="email" name="email"  placeholder="enter your email"  required maxlength="50" class="box">
              
            </div>

            <div class="input-box">
              <input type="number" name="number" placeholder="enter your number" min="0" max="9999999999" required onkeypress="if(this.value.length == 10) return false;" class="box" >
              
            </div>
            
            <div class="input-box">
              <textarea required="true" name="msg" placeholder="enter your message" class="box"  cols="30" rows="10"></textarea>
              
            </div>
            
            <div class="input-box">
              <input type="submit" value="send message" name="send" class="btn">
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </section>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>