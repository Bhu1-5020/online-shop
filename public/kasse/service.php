<?php

// remove
if(isset($_POST['id'], $_POST['action'])){
  $id = $_POST['id'];
  $action = $_POST['action'];
  if(isset($_SESSION['cart'][$id])){
    if($action === "remove"){
     unset ($_SESSION['cart'][$id]) ;
    }
  }

  // cart update

  $updateTotal = 0 ;
  if(!empty($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $q){
      $updateTotal += $q ;
    } 
  }
  $_SESSION['total'] = $updateTotal ;

header("Location: formula.php");
  exit();

}

// Total 
$totalPrice = 0;
if (!empty($_SESSION['cart'])) {
 foreach ($_SESSION['cart'] as $id => $qty) {
    foreach ($products as $p) {
      if ($p['id'] == $id) {
        $subtotal = $p['preis'] * $qty;
           $totalPrice += $subtotal;
            }
       }
  }
}

?>