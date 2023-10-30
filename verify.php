<?php
session_start();

include 'config.php';

$rc = $_GET['RC'];

if ($rc != "successful")
   return;

$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$number = $_SESSION['number'];
$email = $_SESSION['email'];
$method = $_SESSION['method'];
$address = $_SESSION['address'];
$total_products = $_SESSION['total_products'];
$total_price = $_SESSION['total_price'];
$placed_on = $_SESSION['placed_on'];

if (!isset($user_id)) {
   header('location:login.php');
}

$cart_total = 0;
$cart_products = [];
$cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
if (mysqli_num_rows($cart_query) > 0) {
   while ($cart_item = mysqli_fetch_assoc($cart_query)) {
      $cart_products[] = $cart_item['name'] . ' (' . $cart_item['quantity'] . ') ';
      $sub_total = ($cart_item['price'] * $cart_item['quantity']);
      $cart_total += $sub_total;
   }
}


$total_products = implode(', ', $cart_products);

$order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND 
   email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' 
   AND total_price = '$cart_total'") or die('query failed');

if ($cart_total == 0) {
   $message[] = 'your cart is empty';
} else {
   if (mysqli_num_rows($order_query) > 0) {
      $message[] = 'order already placed!';
   } else {
      mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, 
            address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', 
            '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
      $message[] = 'order placed successfully!';
      mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      //
   }
}

header("Location: http://localhost/nikkshop");
