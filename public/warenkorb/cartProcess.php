<?php 
session_start();
// add to cart
if(!isset($_SESSION['cart'])){
    $_SESSION ['cart'] = [];
}
  
if (isset($_POST['id'])) {
    $product_id = $_POST['id'];

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}
  // Cart count 
  
$total = 0;
foreach ($_SESSION['cart'] as $qty) {
    $total += $qty;
}

$_SESSION['total'] = $total;

    

  header("Location: /index.php");
  exit();
?>