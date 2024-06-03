<?php

include '../components/connecting.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['update_payment'])){
   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
   $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_payment->execute([$payment_status, $order_id]);
   $success_msg[] = 'payment status updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   
   if($delete_order->rowCount() > 0){
    $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
    $delete_order->execute([$delete_id]);
    $success_msg[] = 'Order deleted!';
 }else{
    $warning_msg[] = 'Order deleted already!';
 }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>placed orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="../css/search.css">
   <style>
      body{
   background-color: var(--light-bg);
   margin-left: 28rem;
   margin-top: 6rem;
}
.place-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 60px;
}

.place-table th,
.place-table td {
    padding: 20px;
    text-align: center;
    font-size: 18px; /* Increased font size */
    border: 1px solid #ccc;
}

.place-table th {
    background-color: #007bff;
    color: #fff;
}

.place-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.place-table tbody tr:hover {
    background-color: #ddd;
}


   </style>

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="orders">

<h1 class="heading">placed orders</h1>



<div class="box-container">

   <?php
    if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
      $search_box = $_POST['search_box'];
      $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
      $select_orders_m = $conn->prepare("SELECT * FROM `orders` WHERE name LIKE '%{$search_box}%' OR number LIKE '%{$search_box}%' ");
      $select_orders_m->execute();
   }else{
      $select_orders_m = $conn->prepare("SELECT * FROM `orders`");
      $select_orders_m->execute();}
      if($select_orders_m->rowCount() > 0)
         while($fetch_orders_m = $select_orders_m->fetch(PDO::FETCH_ASSOC))
   ?>

</section>

</section>
<section class="place" style=" padding: 3rem; max-width: 1790px; margin: -5px auto;";>
    <table class="place-table">
        <thead>
            <tr>
                <th>Sr no.</th>
                <th>Time On</th>
                <th>Placed On</th>
                <th>Name</th>
                <th>Number</th>
                <th>Address</th>
                <th>Total Products</th>
                <th>Total Price</th>
                <th>Payment method</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select_orders_m = $conn->prepare("SELECT * FROM `orders`");
            $select_orders_m->execute();
            if ($select_orders_m->rowCount() > 0) {
                $serialNumber = 1; // Initialize a serial number counter
                while ($fetch_orders = $select_orders_m->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $serialNumber . '</td>'; // Display the serial number
                    echo '<td>' . date('h:i A', strtotime($fetch_orders['time_on'])) . '</td>';
                    echo '<td>' . $fetch_orders['placed_on'] . '</td>';
                    echo '<td>' . $fetch_orders['name'] . '</td>';
                    echo '<td>' . $fetch_orders['number'] . '</td>';
                    echo '<td>' . $fetch_orders['address'] . '</td>';
                    echo '<td>' . $fetch_orders['total_products'] . '</td>';
                    echo '<td>' . $fetch_orders['total_price'] . '</td>';
                    echo '<td>' . $fetch_orders['method'] . '</td>';
                    echo '<td>
                            <form action="" method="post">
                                <input type="hidden" name="order_id" value="' . $fetch_orders['id'] . '">
                                <select name="payment_status" class="select">
                                <option selected disabled>' . $fetch_orders['payment_status'] . '</option>
                                    <option value="pending">pending</option>
                                    <option value="completed">completed</option>
                                </select>
                                <div class="flex-btn">
                                    <input type="submit" value="update" class="option-btn" name="update_payment">
                                    <a href="placed_orders.php?delete=' . $fetch_orders['id'] . '" class="delete-btn" onclick="return confirm(\'Delete this order?\');">delete</a>
                                </div>
                            </form>
                          </td>';
                    echo '</tr>';
                    $serialNumber++; // Increment the serial number for the next row
                }
            } else {
                echo '<tr><td colspan="10" class="empty">You have no orders</td></tr>';
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