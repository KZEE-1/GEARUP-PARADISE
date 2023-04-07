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

<header class="header">

    <section class="flex">

        <a href="../admin/dashboard.php" class="logo">
            <h2>
                ADMINISTRATOR
            </h2>
            <img src="../images/GEARUP.png" height="100" width="150" style="cursor: pointer;">
        </a>


        <nav class=" navbar">
            <a href="../admin/dashboard.php">Home</a>
            <a href="../admin/products.php">Products</a>
            <a href="../admin/placed_orders.php">Orders</a>
            <a href="../admin/admin_accounts.php">Admins</a>
            <a href="../admin/users_accounts.php">Users</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user-circle"></div>
        </div>

        <div class="profile">
            <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
            <p><?= $fetch_profile['name']; ?></p>
            <a href="../admin/update_profile.php" class="btn">update profile</a>
            <div class="flex-btn">
                <a href="../admin/register_admin.php" class="option-btn">register</a>
                <a href="../admin/admin_login.php" class="option-btn">login</a>
            </div>
            <a href="../components/admin_logout.php" class="delete-btn"
                onclick="return confirm('logout from the website?');">logout</a>
        </div>


        <style>
        /* Header styling */
        .header {
            background-color: black;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
            padding: 0;

        }

        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            color: #000;
            text-decoration: none;
            font-weight: bold;
            padding-right: -100px;




        }

        .header h2 {
            color: #ffff;
        }

        .logo span {
            color: #F57F17;
        }

        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;

        }

        .navbar a {
            color: #000;
            text-decoration: none;
            margin: 0 15px;
            position: relative;
            transition: all 0.3s ease;
        }

        .navbar a:before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 2px;
            background-color: #F57F17;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .navbar a:hover:before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .icons {
            display: flex;
            align-items: center;
        }

        .icons i {
            font-size: 20px;
            margin: 0 10px;
        }

        .btn {
            background-color: #F57F17;
            color: #fff;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #fff;
            color: #F57F17;
            border: 2px solid #F57F17;
        }

        .delete-btn {
            color: #fff;
            background-color: #F44336;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #fff;
            color: #F44336;
            border: 2px solid #F44336;
        }
        </style>
    </section>
</header>