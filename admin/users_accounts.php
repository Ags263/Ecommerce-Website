<?php

include '../components/connecting.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_user = $conn->prepare("DELETE FROM `users` WHERE id = ?");
   $delete_user->execute([$delete_id]);
   $delete_orders = $conn->prepare("DELETE FROM `orders` WHERE user_id = ?");
   $delete_orders->execute([$delete_id]);
   $delete_messages = $conn->prepare("DELETE FROM `messages` WHERE user_id = ?");
   $delete_messages->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `mskin_cart` WHERE user_id = ?");


   if($delete_user->rowCount() > 0){
    $delete_wishlist = $conn->prepare("DELETE FROM `users` WHERE id = ?");
    $delete_wishlist->execute([$delete_id]);
    $success_msg[] = 'user deleted!';
   }else{
      $warning_msg[] = 'User deleted already!';
   }
}
?>

<!DOCTYPE html>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">
   <style>
    body{
   background-color: var(--light-bg);
   margin-left: 28rem;
   margin-top: 6rem;
}
.user-table {
width: 100%;
border-collapse: collapse;
margin-bottom: 20px;
}

.user-table th,
.user-table td {
padding: 10px;
text-align: center;
font-size: 18px; /* Increased font size */
border: 1px solid #ccc;
}

.user-table th {
background-color: #007bff;
color: #fff;
}

.user-table tbody tr:nth-child(even) {
background-color: #f2f2f2;
}

.user-table tbody tr:hover {
background-color: #ddd;
}
</style>

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="accounts">

   <h1 class="heading">user accounts</h1>

   <div class="box-container">

   <?php
      $select_accounts = $conn->prepare("SELECT * FROM `users`");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0)
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC))  
   ?>
   

   </div>

</section>

<section class="user" style=" padding: 3rem; max-width: 1790px; margin: -5px auto;";>

    <table class="user-table">
        <thead>
            <tr>
                <th>Sr no.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select_messages = $conn->prepare("SELECT * FROM `users`");
            $select_messages->execute();
            if ($select_messages->rowCount() > 0) {
                $serialNumber = 1; // Initialize a serial number counter
                while ($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $serialNumber . '</td>'; // Display the serial number
                    echo '<td>' . $fetch_messages['name'] . '</td>';
                    echo '<td>' . $fetch_messages['email'] . '</td>';
                    echo '<td><a href="users_accounts.php?delete=' . $fetch_messages['id'] . '" class="delete-btn" onclick="return confirm(\'Delete this message?\');">Delete</a></td>';
                    echo '</tr>';
                    $serialNumber++; // Increment the serial number for the next row
                }
            } else {
                echo '<tr><td colspan="6" class="empty">You have no user accounts</td></tr>';
            }
            ?>
        </tbody>
    </table>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>
</body>
</html>
