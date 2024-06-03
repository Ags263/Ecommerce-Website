<?php

include '../components/connecting.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
   $delete_message->execute([$delete_id]);
   
   if($delete_message->rowCount() > 0){
      $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
      $delete_message->execute([$delete_id]);
      $success_msg[] = 'Message deleted!';
   }else{
      $warning_msg[] = 'Message deleted already!';
   }

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="../css/search.css">
   <style>
      body{
   background-color: var(--light-bg);
   margin-left: 28rem;
   margin-top: 6rem;
}
   .messages-table {
   width: 100%;
   border-collapse: collapse;
   margin-bottom: 20px;
}

.messages-table th,
.messages-table td {
   padding: 10px;
   text-align: center;
   font-size: 18px; /* Increased font size */
   border: 1px solid #ccc;
}

.messages-table th {
   background-color: #007bff;
   color: #fff;
}

.messages-table tbody tr:nth-child(even) {
   background-color: #f2f2f2;
}

.messages-table tbody tr:hover {
   background-color: #ddd;
}

   </style>

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="contacts">

<h1 class="heading">messages</h1>


<div class="box-container">

   <?php
   if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
      $search_box = $_POST['search_box'];
      $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
      $select_messages = $conn->prepare("SELECT * FROM `messages` WHERE name LIKE '%{$search_box}%' OR number LIKE '%{$search_box}%' OR email LIKE '%{$search_box}%'");
      $select_messages->execute();
   }else{
      $select_messages = $conn->prepare("SELECT * FROM `messages`");
      $select_messages->execute();}
      if($select_messages->rowCount() > 0){
         while($fetch_message = $select_messages->fetch(PDO::FETCH_ASSOC)){
   ?>
   <?php
         }
      }
   
      elseif(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
         echo '';
       } else{
         echo '';
      }
   ?>

</div>

</section>

<section class="messages" style=" padding: 3rem; max-width: 1790px; margin: -5px auto;";>

    <table class="messages-table">
        <thead>
            <tr>
                <th>Sr no.</th>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
            if ($select_messages->rowCount() > 0) {
                $serialNumber = 1; // Initialize a serial number counter
                while ($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $serialNumber . '</td>'; // Display the serial number
                    echo '<td>' . $fetch_messages['name'] . '</td>';
                    echo '<td>' . $fetch_messages['number'] . '</td>';
                    echo '<td>' . $fetch_messages['email'] . '</td>';
                    echo '<td>' . $fetch_messages['message'] . '</td>';
                    echo '<td><a href="messages.php?delete=' . $fetch_messages['id'] . '" class="delete-btn" onclick="return confirm(\'Delete this message?\');">Delete</a></td>';
                    echo '</tr>';
                    $serialNumber++; // Increment the serial number for the next row
                }
            } else {
                echo '<tr><td colspan="6" class="empty">You have no messages</td></tr>';
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