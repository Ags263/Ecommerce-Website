<?php

include 'components/connecting.php';


session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email,]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $warning_msg[] = 'email already exists!';
   }else{
      if($pass != $cpass){
         $error_msg[] = 'password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         $success_msg[] = 'registered successfully, login now please!';
         header('location:user_login.php');
      }
   }

}

?>


   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <section class="form-container">
        

    <form action="" method="post">
    <div class="container">
        <div class="form signup">
            <h2>Sign Up</h2>
            <div class="blob"></div>
            <div class="inputBox">
                <input type="text" required="required" name="name"  maxlength="20"  class="box">
                <i class="fa-regular fa-user fa-beat" style="color: #1a66ea;"></i>
                <span>username</span>

            </div>
            <div class="inputBox">
                <input type="text" required="required" name="email"  maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <i class="fa-regular fa-envelope fa-beat" style="color: #005cfa;"></i>
                <span>email address</span>
                
            </div>
            <div class="inputBox">
                <input type="text" required="required" name="pass" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')" >
                <i class="fa-solid fa-lock fa-beat" style="color: #0255e3;"></i>
                <span>create password</span>
                
            </div>
            <div class="inputBox">
                <input type="text" required="required" name="cpass" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <i class="fa-solid fa-lock fa-beat" style="color: #0255e3;"></i>
                <span>confirm password</span>
                
            </div>
            <div class="inputBox">
                <input type="submit" value="register now" class="btn" name="submit">
                
                
            </div>
            <p>Already a member ? <a href="user_login.php" class="create" >Log-In</a></p>
        </div>
</div>
</form>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>
    <script>
        let login = document.querySelector('.login');
        let create = document.querySelector('.create');
        let container = document.querySelector('.container');

        login.onclick = function(){
            container.classList.add('signinForm');
        }
        create.onclick = function(){
            container.classList.remove('signinForm');
        }
    </script>
 
 <?php include 'components/message.php'; ?>
</body>
</html>