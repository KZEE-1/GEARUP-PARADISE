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

        <a href="home.php" class="logo">
            <img src="images\GEARUP.png" height="100 " width="150">
        </a>


        <nav class=" navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="orders.php">Orders</a>
            <a href="shop.php">Shop</a>
        </nav>

        <div class="icons">
            <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php"><i class="fas fa-search-plus"></i></a>
            <a href="cart.php"><i class="fas fa-shopping-bag"></i>
                <span>(<?= $total_cart_counts; ?>)</span></a>
            <div id="user-btn" class="fas fa-user-circle"></div>

            <style>
            .icon a {

                padding: 20px;
            }
            </style>
        </div>

        <div class="profile">
            <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
            <p><?= $fetch_profile["name"]; ?></p>
            <a href="update_user.php" class="btn">update profile</a>
            <div class="flex-btn">
                <a href="user_register.php" class="option-btn">register</a>
                <a href="user_login.php" class="option-btn">login</a>
            </div>
            <a href="components/user_logout.php" class="delete-btn"
                onclick="return confirm('logout from the website?');">logout</a>
            <?php
            }else{
         ?>
            <p>please login or register first!</p>
            <div class="flex-btn">
                <a href="user_register.php" class="option-btn">register</a>
                <a href="user_login.php" class="option-btn">login</a>
            </div>
            <?php
            }
         ?>
            <style>
            .header {
                background-color: black;
            }

            .navbar a {
                color: #ffeb00;
                /* set the default color to white */
                text-decoration: none;

                transition: color 0.3s;
                /* add a transition effect to color change */

            }

            .navbar a:hover {
                color: #ffeb00;
                /* set the hover color to yellow */
            }


            .icons a,
            .icons i {
                color: white;
            }

            .header .flex .navbar a {
                margin: 0 1rem;
                font-size: 2rem;
                color: var(--white);
            }

            .header .flex .icons>* {
                margin-left: 1rem;
                font-size: 2.5rem;
                cursor: pointer;
                color: var(--white);
            }

            .header .flex .icons a span {
                font-size: 2rem;

            }

            * {
                font-family: "Open Sans", sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                outline: none;
                border: none;
                text-decoration: none;
            }
            </style>
        </div>
    </section>
</header>