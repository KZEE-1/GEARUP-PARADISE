<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

    <?php include '../components/admin_header.php'; ?>


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
        <section class="dashboard">
            <h1 class="heading">dashboard</h1>
            <div class="box-container">
                <div class="box">
                    <h3>welcome !</h3>
                    <p><?=$fetch_profile['name'];
            ?></p><a href="update_profile.php" class="btn">update profile</a>
                </div>
                <div class="box"><?php $total_pendings=0;
            $select_pendings=$conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_pendings->execute(['pending']);

            if($select_pendings->rowCount() > 0) {
                while($fetch_pendings=$select_pendings->fetch(PDO::FETCH_ASSOC)) {
                    $total_pendings+=$fetch_pendings['total_price'];
                }
            }

            ?><h3><span>RM</span><?=$total_pendings;
            ?><span></span></h3>
                    <p>total pendings</p><a href="placed_orders.php" class="btn">see orders</a>
                </div>
                <div class="box"><?php $total_completes=0;
            $select_completes=$conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_completes->execute(['completed']);

            if($select_completes->rowCount() > 0) {
                while($fetch_completes=$select_completes->fetch(PDO::FETCH_ASSOC)) {
                    $total_completes+=$fetch_completes['total_price'];
                }
            }

            ?><h3><span>RM</span><?=$total_completes;
            ?><span></span></h3>
                    <p>completed orders</p><a href="placed_orders.php" class="btn">see orders</a>
                </div>
                <div class="box"><?php $select_orders=$conn->prepare("SELECT * FROM `orders`");
            $select_orders->execute();
            $number_of_orders=$select_orders->rowCount() ?><h3><?=$number_of_orders;
            ?></h3>
                    <p>orders placed</p><a href="placed_orders.php" class="btn">see orders</a>
                </div>
                <div class="box"><?php $select_products=$conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $number_of_products=$select_products->rowCount() ?><h3><?=$number_of_products;
            ?></h3>
                    <p>products added</p><a href="products.php" class="btn">see products</a>
                </div>
                <div class="box"><?php $select_users=$conn->prepare("SELECT * FROM `users`");
            $select_users->execute();
            $number_of_users=$select_users->rowCount() ?><h3><?=$number_of_users;
            ?></h3>
                    <p>normal users</p><a href="users_accounts.php" class="btn">see users</a>
                </div>
                <div class="box"><?php $select_admins=$conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins=$select_admins->rowCount() ?><h3><?=$number_of_admins;

            ?></h3>
                    <p>admin users</p><a href="admin_accounts.php" class="btn">see admins</a>
                    <style>
                    .box-container {
                        padding-left: 100px;

                    }
                    </style>
                </div>

            </div>
        </section>
        <script src="../js/admin_script.js"></script>
    </body>

</html>