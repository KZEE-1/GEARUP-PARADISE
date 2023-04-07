<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <section class="about">

        <div class="row">


        </div>

        <div class="about">
            <div class="inner-section">
                <h1>About Us</h1>
                <p class="text">
                <h2>When it comes to premium exercise gear and clothes, go no further than Gear Up Paradise. Our
                    mission is to encourage people to live healthier, more active lives by providing them with the
                    resources they need to reach their fitness objectives.

                    Our goal is to provide customers with a wide selection of high-quality, reasonably priced fitness
                    equipment and clothes. We think that everyone, regardless of their current fitness level, should
                    have access to the resources they need to develop to their fullest potential. </h2>

                <br> <br> <br>
                <h3>Items We Offer: </h3>
                <br> <br>
                Everything from home gym equipment to training clothes is available here at Gear Up Paradise. To
                ensure that our customers only receive the highest quality items, we only carry those manufactured
                by the most reputable names in the fitness business.

                A variety of cardio and weight training nks are available at our facility.
                <br> <br> <br>
                <h4> What We Offer:</h4>
                <br> <br>
                Gear Up Paradise is devoted to more than just satisfying its customers with high-quality goods,
                though. Our number one priority is making sure you, the consumer, are happy with your purchase from
                us.

                If you have any questions or concerns about our fitness goods or services, our team of specialists
                is here to help. In addition to prompt and reliable delivery, we also provide simple returns and
                safe online payment options.
                <br> <br> <br>
                <h5> >Gear Up Paradise: Why Go There?</h5>
                <br> <br>
                Superior items, unrivalled service, and affordable prices are what we promise to anybody who shops
                with us. We offer the tools and expertise to help you reach your fitness objectives, no matter where
                you are starting from.

                Be ready, because now is the time to join the Gear Up Paradise group!
                </p>
                <div class="skills">
                    Contact Us
                    <p>Email : gearup411paradise@gmail.com
                        <br>
                        Phone-Num: 60+134557192
                        <br>
                        Contact-Service Maintance: <br>60+145052175 <br> 60+45114926


                        <br> <br><br><br><br><br>
                    </p>
                </div>
                <style>
                /* Style for the entire section */
                .about {
                    background-color: #f9f9f9;
                    padding: 50px;
                }

                /* Style for the section heading */
                .about h1 {
                    font-size: 3rem;
                    text-align: center;
                    margin-bottom: 30px;
                }

                /* Style for the section subheadings */
                .about h2,
                h3,
                h4,
                h5 {
                    font-size: 24px;
                    margin-top: 30px;
                    margin-bottom: 20px;
                }

                /* Style for the section text */
                .about p.text {
                    font-size: 1.2rem;
                    line-height: 1.5;
                    margin-bottom: 30px;
                }

                /* Style for the contact section */
                .about .skills {
                    font-size: 1.2rem;
                    margin-top: 50px;
                }

                /* Style for the contact details */
                .about .skills p {
                    font-size: 1rem;
                    margin-bottom: 20px;
                }
                </style>
            </div>
        </div>
    </section><?php include 'components/footer.php';

                ?><script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>

    </script>
</body>

</html>