<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['update_payment'])){
   $order_id = $_POST['order_id'];
   $payment_status = isset($_POST['payment_status']) ? $_POST['payment_status'] : null;
   if($payment_status){
      $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
      $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
      $update_payment->execute([$payment_status, $order_id]);
      $message[] = 'payment status updated!';
   }
}


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>placed orders</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<head>
    <title>My Dashboard</title>
    <style>
    body {
        margin: 0;
        padding: 0;
    }

    .sidebar {
        height: 100%;
        width: 200px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #222;
        overflow-x: hidden;
        padding-top: 150px;
    }

    .sidebar a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
    }

    .sidebar a:hover {
        color: #f1f1f1;
    }

    .main {
        margin-left: 200px;
        padding: 0px 10px;
    }

    .heading {
        text-align: center;
        font-size: 30px;
        margin-top: 50px;
    }

    .new-section {
        background-color: #f1f1f1;
        padding: 20px;
        margin-top: 50px;
        text-align: center;
    }
    </style>
</head>

<body>

    <div class="sidebar">
        <a href="dashboard.php">Home</a>
        <a href="products.php">Products</a>
        <a href="placed_orders.php">Orders</a>
        <a href="admin_accounts.php">Admins</a>
        <a href="users_accounts.php">Users</a>
    </div>

    <body>

        <?php include '../components/admin_header.php'; ?>

        <section class="orders">

            <h1 class="heading">placed orders</h1>

            <div class="box-container">

                <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
                <div class="box">
                    <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
                    <p> name : <span><?= $fetch_orders['name']; ?></span> </p>
                    <p> number : <span><?= $fetch_orders['number']; ?></span> </p>
                    <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
                    <p> total products : <span><?= $fetch_orders['total_products']; ?></span> </p>
                    <p> total price : <span>RM<?= $fetch_orders['total_price']; ?>/-</span> </p>
                    <p> payment method : <span><?= $fetch_orders['method']; ?></span> </p>
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
                        <select name="payment_status" class="select">
                            <option selected disabled><?= $fetch_orders['payment_status']; ?></option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                        </select>
                        <div class="flex-btn">
                            <input type="submit" value="update" class="option-btn" name="update_payment">
                            <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn"
                                onclick="return confirm('delete this order?');">delete</a>
                        </div>
                    </form>
                </div>
                <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
   ?>

            </div>

        </section>

        </section>












        <script src="../js/admin_script.js"></script>

    </body>

</html>