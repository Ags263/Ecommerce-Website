<?php

include 'components/connecting.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
};

if(isset($_POST['order'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $flat = $_POST['flat'];
$flat = filter_var($flat, FILTER_SANITIZE_STRING);

$address = $flat . ', ' . $_POST['city'] . ', ' . $_POST['state'] . ',  - ' . $_POST['pin_code'];

   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `mskin_cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);

   if($check_cart->rowCount() > 0){

      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $total_price]);

      $delete_cart = $conn->prepare("DELETE FROM `mskin_cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);

      $success_msg[] = 'order placed successfully!';
   }else{
      $info_msg[] = 'your cart is empty';
   }

}

?>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      body{
   background-image: url('vivid.jpg');
   background-repeat: round;
   
}
      .display-orders{
   text-align: center;
   padding-bottom: 0;
}

.display-orders p{
   display: inline-block;
   padding:1rem 2rem;
   margin:1rem .5rem;
   font-size: 2rem;
   text-align: center;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
}

.display-orders p span{
   color:var(--red);
}

.display-orders .grand-total{
   margin-top: 2rem;
   font-size: 2.5rem;
   color:var(--light-color);
}

.display-orders .grand-total span{
   color:var(--red);
}

      
.checkout-orders form{
   padding:2rem;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
}

.checkout-orders form h3{
   border-radius: .5rem;
   background-color: var(--black);
   color:var(--white);
   padding:1.5rem 1rem;
   text-align: center;
   text-transform: uppercase;
   margin-bottom: 2rem;
   font-size: 2.5rem;
}

.checkout-orders form .flex{
   display: flex;
   flex-wrap: wrap;
   gap:1.5rem;
   justify-content: space-between;
}

.checkout-orders form .flex .inputBox{
   width: 49%;
}

.checkout-orders form .flex .inputBox .box{
   width: 100%;
   border:var(--border);
   border-radius: .5rem;
   font-size: 1.8rem;
   color:var(--black);
   padding:1.2rem 1.4rem;
   margin:1rem 0;
   background-color: var(--light-bg);
}

.checkout-orders form .flex .inputBox span{
   font-size: 1.8rem;
   color:var(--light-color);
}
   </style>
 
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="checkout-orders">

   <form action="" method="POST">

   <h3>your orders</h3>

      <div class="display-orders">
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart_prod = $conn->prepare("SELECT * FROM `mskin_cart` WHERE user_id = ?");
         $select_cart_prod->execute([$user_id]);
         if($select_cart_prod->rowCount() > 0){
            while($fetch_cart = $select_cart_prod->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
         <p> <?= $fetch_cart['name']; ?> <span>(<?= '₹'.$fetch_cart['price'].'/- x '. $fetch_cart['quantity']; ?>)</span> </p>
      <?php
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
         <div class="grand-total">grand total : <span>₹<?= $grand_total; ?>/-</span></div>
      </div>

      <h3>place your orders</h3>

      <div class="flex">
         <div class="inputBox">
            <span>your name :</span>
            <input type="text" name="name" placeholder="enter your name" class="box" maxlength="20" required>
         </div>
         <div class="inputBox">
            <span>your number :</span>
            <input type="number" name="number" placeholder="enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" name="email" placeholder="enter your email" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select name="method" class="box" required>
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit card">Google Pay</option>
               <option value="paytm">Phone Pe</option>
               <option value="paypal">Paytm</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address :</span>
            <input type="text" name="flat" placeholder="Enter flat number" class="box" maxlength="50" required>

         </div>
         
         <div class="inputBox">
            <span>city :</span>
            <input type="text" name="city" placeholder="e.g. mumbai" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>state :</span>
            <input type="text" name="state" placeholder="e.g. maharashtra" class="box" maxlength="50" required>
         
         <div class="inputBox">
            <span>pin code :</span>
            <input type="number" min="0" name="pin_code" placeholder="e.g. 123456" min="0" max="777777" onkeypress="if(this.value.length == 6) return false" class="box" required>
         </div>
      </div>

      <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="place order">

   </form>

</section>






<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>








<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>



<?php include 'components/message.php'; ?>

</body>
</html>