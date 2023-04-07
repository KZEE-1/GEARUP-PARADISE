<?php

include '../components/connect.php';

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
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE user_id = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:users_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users accounts</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">


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
    </head>

    <body>

        <?php include '../components/admin_header.php'; ?>

        <section class="accounts">

            <h1 class="heading">user accounts</h1>

            <div class="box-container">

                <?php
      $select_accounts = $conn->prepare("SELECT * FROM `users`");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>
                <div class="box">
                    <p> user id : <span><?= $fetch_accounts['id']; ?></span> </p>
                    <p> username : <span><?= $fetch_accounts['name']; ?></span> </p>
                    <p> email : <span><?= $fetch_accounts['email']; ?></span> </p>
                    <a href="users_accounts.php?delete=<?= $fetch_accounts['id']; ?>"
                        onclick="return confirm('delete this account? the user related information will also be delete!')"
                        class="delete-btn">delete</a>


                    <style>
                    .box-container {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        max-width: 1200px;
                        margin: 0 auto;
                        padding: 100px 100px;
                        background-color: #fff;
                        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                        border-radius: 10px;
                    }
                    </style>
                </div><?php
                }
                }

                else {
                    echo '<p class="empty">no accounts available!</p>';
                }

                ?>
            </div>
        </section>
        <script src="../js/admin_script.js"></script>
    </body>

</html>