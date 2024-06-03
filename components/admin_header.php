<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>
<style>
   
.header{
   position: fixed;
   top: 0; left: 0; bottom: 0;
   background-color: var(--white);
   border-right: var(--border);
   background-color: var(--white);
   width: 30rem;
   padding: 2rem;
   z-index: 1100;
}

.header .logo{
   display: block;
   text-align: center;
   font-size: 2.5rem;
   color: var(--black);
   padding-bottom: 1rem;
}

.header .navbar{
   padding:.5rem 0;
}

.header .navbar a{
   display: block;
   border-radius: .5rem;
   margin: 1.2rem 0;
   font-size:1.7rem;
   color: var(--black);
   padding:1.5rem 1.7rem;
   background-color: var(--light-bg);
   border: var(--border);
}

.header .navbar a:hover{
   background-color: var(--black);
   color: var(--white);
}

.header .navbar a i{
   margin-right: 1.2rem;
}

.header .delete-btn i{
   margin-right: 1rem;
}

#close-btn{
   text-align: right;
   padding-bottom: 1rem;
   display: none;
}

#close-btn i{
   height: 4rem;
   width: 4.5rem;
   line-height: 4rem;
   border-radius: .5rem;
   background-color: var(--red);
   color: var(--white);
   font-size: 2.5rem;
   text-align: center;
}

#menu-btn{
   position: sticky;
   top: 1rem; left: 1rem;
   height: 4rem;
   line-height: 4rem;
   width: 4.5rem;
   background-color: var(--black);
   color: var(--white);
   font-size: 2rem;
   border-radius: .5rem;
   text-align: center;
   z-index: 1000;
   display: none;
}
</style>
<header class="header">

   <div id="close-btn"><i class="fas fa-times"></i></div>

   <a href="../admin/dashboard.php" class="logo">MEN'S SKINCARE</a>

   <nav class="navbar">
      <a href="../admin/dashboard.php"><i class="fas fa-home"></i><span>home</span></a>
      <a href="../admin/products.php"><i class="fas fa-building"></i><span>products</span></a>
      <a href="../admin/placed_orders.php"><i class="fas fa-user"></i><span>orders</span></a>
      <a href="../admin/users_accounts.php"><i class="fa fa-users" aria-hidden="true"></i><span>users</span></a>
      <a href="../admin/messages.php"><i class="fas fa-message"></i><span>messages</span></a>
   </nav>


      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>

         <div class="flex-btn">
            <a href="../components/register_admin.php" class="option-btn">register</a>
            <a href="../admin/admin_login.php" class="option-btn">login</a>
         </div>
         <a href="../components/admin_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
      </div>

   </section>

</header>
