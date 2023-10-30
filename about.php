<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/logo.png" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
<p>Choose Nikk Store because of our unwavering commitment to excellence and customer satisfaction. Our team of tech experts brings a wealth of knowledge and experience to help you find the perfect solutions for your computing needs. With a diverse range of high-quality products, including cutting-edge computers, laptops, peripherals, software, and accessories, we cater to a wide spectrum of customers. What sets us apart is our dedication to competitive pricing, ensuring that you get the best value for your investment. At Nikk Store, we prioritize your satisfaction and aim to provide you with a seamless and enjoyable shopping experience.</p>  
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>


<section class="authors">

   <h1 class="title"> Products</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/laptop.jpg" alt="">
        
         <h3>laptops</h3>
      </div>

      <div class="box">
         <img src="images/keyboard.jpg" alt="">
        
         <h3>Keyboards</h3>
      </div>

      <div class="box">
         <img src="images/mouse.png" alt="">
        
         <h3>Mouse</h3>
      </div>

      <div class="box">
         <img src="images/headphone.jpg" alt="">
        
         <h3>Headphone</h3>
      </div>

      <div class="box">
         <img src="images/phone.jpg" alt="">
         
         <h3>Phones</h3>
      </div>

      <div class="box">
         <img src="images/monitor.jpg" alt="">
        
         <h3>Monitors</h3>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>