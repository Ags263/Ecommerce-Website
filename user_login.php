<?php

include 'components/connecting.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $error_msg[] = 'incorrect username or password!';
   }

}

?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body
        {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(images/shaa.png) no-repeat;
            background-size: cover;
            background-position: center;

        }
        .container{
            padding: 40px;
        }
        .container .form
        {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 25px;
        }
        .container .form .signin,
        .container .signinForm .form
        {
            display: none;
        }
        .container .signinForm .form.signin
        {
            display: flex;
        }
        .container .form h2
        {
            color: #2b2424;
            font-weight: 550;
            letter-spacing: 0.1em;
        }
        .container .form .inputBox
        {
            position: relative;
            width: 300px;
        }
        .container .form .inputBox input
        {
            padding: 12px 10px 12px 48px;
            border: none;
            width: 100%;
            background: #223243;
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: #fff;
            font-weight: 350;
            border-radius: 25px;
            font-size: 1em;
            box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.1),
            5px 5px 15px rgba(0, 0, 0, 0.35);
            transition: 0.5s;
            outline: none;
        }
        .container .form .inputBox span
        {
            position: absolute;
            left: 0;
            padding: 12px 10px 12px 48px;
            pointer-events: none;
            font-size: 1em;
            font-weight: 330;
            transition: 0.5s;
            letter-spacing: 0.05em;
            color: rgba(255, 255, 255, 0.5);
        }
        .container .form .inputBox input:valid ~ span,
        .container .form .inputBox input:focus ~span
        {
            border: 1px solid #00dfc4;
            color: #00dfc4;
            background: #223243;
            transform: translateX(25px) translateY(-7px);
            font-size: 0.6rem;
            padding: 0.8px;
            border-radius: 10px;
            letter-spacing: 0.1em;
        }
        .container .form .inputBox input:valid,
        .container .form .inputBox input:focus 
        {
            border: 1px solid #00dfc4;
        }
        .container .form .inputBox i 
        {
            position: absolute;
            top: 15px;
            left: 16px;
            width: 25px;
            padding: 2px 0;
            padding-right: 8px;
            color: #00dfc4;
            border-right: 1px solid #00dfc4;

        }
        .container .form .inputBox input[type="submit"]
        {
            background: #00dfc4;
            color: #223243;
            padding: 10px 0;
            font-weight: 500;
            cursor: pointer;
            box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.1),
            5px 5px 15px rgba(0, 0, 0, 0.35),
            inset -5px -5px 15px rgba(255,255,255,0.1),
            inset 5px 5px 15px rgba(0,0,0,0.35);
        }
        .container .form p
        {
            color: rgba(44, 11, 235, 0.5);
            font-size: 0.95em;
            font-weight: 500;
        }
        .container .form p a
        {
            font-weight: 500;
            color: black;
        }
</style>
</head>
<body>
<section class="form-container">

<form action="" method="post">
<div class="container">
    <div class="form signup">
        <h2>Sign Up</h2>
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
            <input type="submit" value="login now" class="btn" name="submit">
            
            
        </div>
        <p>Not a member ? <a href="user_register.php" class="create" >Register</a></p>
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