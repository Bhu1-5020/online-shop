<?php
 
 require "DBconfig.php";
 require_once "DBtable.php" ;
 require "../products.php";
 
 $userInput = $_SESSION['clean_data'];
 $cartItems = $_SESSION['cart'];
 try{
  $sql = "INSERT INTO bestellung (vorname , nachname , email , phone , addresses , plz , ort )
          VALUES(:firstName , :lastName , :email , :phoneNumber , :addresses , :plz , :ort)";

          $stmt = $connection ->prepare($sql);

          $user = [
            ':firstName'     => $userInput["firstName"],
            ':lastName'      => $userInput["lastName"],
            ':email'         => $userInput["email"],
            ':phoneNumber'   => $userInput["phoneNumber"] ?? null,
            ':addresses' => $userInput["addresses"],
            ':plz'       => $userInput["plz"] ?? null,
            ':ort'       => $userInput["ort"]
            ];
     $stmt ->execute($user);
 }catch (PDOException $e){
        echo "Error : "  . $e ->getMessage();
     }

 try{
  
$order_ID = $connection->lastInsertId();

$sql = "INSERT INTO bestellungpositionen 
(orderId, product_id, product_name, price, quantity)
VALUES (:orderid, :proID, :proName, :proPrice, :qty)";

foreach ($cartItems as $productId => $qty) {

    foreach ($products as $p) {
        if ($p['id'] == $productId) {

            $stmt = $connection->prepare($sql);

            $cart = [
                ':orderid' => $order_ID,
                ':proID'   => $p['id'],
                ':proName' => $p['name'],
                ':proPrice'=> $p['preis'],
                ':qty'     => $qty
            ];

            $stmt->execute($cart);
        }
    }
}

 } catch (PDOException $e){
        echo "Error : "  . $e ->getMessage();
     }

?>