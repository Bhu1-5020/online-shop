<?php
session_start();

if(isset($_POST['id'], $_POST['action'])){
    $id = $_POST['id'];
    $action = $_POST['action'];

    if(isset($_SESSION['cart'][$id])){
        if($action === "increase"){
            $_SESSION['cart'][$id] ++ ;
        }
    }
}

$total = 0;
foreach ($_SESSION['cart'] as $qty) {
    $total += $qty;
}
$_SESSION['total'] = $total;

header("Location: /index.php");
exit();
?>