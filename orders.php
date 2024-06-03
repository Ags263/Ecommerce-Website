<?php

include 'components/connecting.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>


   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      body{
   background-image: url('vivid.jpg');
   background-repeat: round;
   
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
    border: 1px solid #000;
    background: azure;
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
   
<?php include 'components/user_header.php'; ?>

<section class="orders">

   <h1 class="heading">placed orders</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">please login to see your orders</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
            }
        }
   ?>
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
                    echo '<td>';
                    // Check payment status and set the color
                    if ($fetch_orders['payment_status'] == 'pending') {
                        echo '<span style="color: blue;">' . $fetch_orders['payment_status'] . '</span>';
                    } else {
                        echo '<span style="color: green;">' . $fetch_orders['payment_status'] . '</span>';
                    }
                    echo '</td>';
                    echo '</tr>';
                    $serialNumber++; // Increment the serial number for the next row
                }
            } else {
                echo '<tr><td colspan="10" class="empty">You have no orders</td></tr>';
            }
        }
    
            ?>
        </tbody>
    </table>
</section>


<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>