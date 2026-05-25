<?php
require "DBconfig.php";
// Bestelullung
try{
$sql = "CREATE TABLE IF NOT EXISTS bestellung ( 
orderID            INT            AUTO_INCREMENT  PRIMARY KEY,
vorname            VARCHAR(20)                     NOT NULL,
nachname           VARCHAR(20)                     NOT NULL,
email              VARCHAR(50)                     NOT NULL,
phone              VARCHAR(14)                     NOT NULL,
addresses          VARCHAR(30)                     NOT NULL,
plz                INT                             NOT NULL,
ort                VARCHAR(15)                     NOT NULL

)AUTO_INCREMENT= 1100";

 $stmt = $connection ->prepare($sql);
 $stmt ->execute();
  

} catch(PDOException $e){
   echo "Error Bestellung table : " . $e ->getMessage();
}

//Bestellpositionen
try {
   
 $sql = "CREATE TABLE IF NOT EXISTS bestellungpositionen(
   orderID               INT               NOT NULL,
   product_id           INT               NOT NULL,
   product_name         VARCHAR(100)      NOT NULL,
   price                DECIMAL(10,2)     NOT NULL,
   quantity             INT               NOT NULL,
   FOREIGN KEY (orderID) REFERENCES bestellung(orderID)
    ON DELETE CASCADE
 )";

 $stmt = $connection ->prepare($sql);
 $stmt ->execute();

} catch(PDOException $e){
   echo "Error Bestellpositionen table : " . $e ->getMessage();
}

?>