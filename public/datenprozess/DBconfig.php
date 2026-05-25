<?php
//ddev 
$host = "db";
$username = "db";
$pass = "db";
$dbname ="db";
   
      try{

      $connection = new PDO("mysql:host=$host;dbname=$dbname", $username , $pass);
      $connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      }catch(PDOException $e){
            echo "Connection error : " . $e ->getMessage() ;
      }

?>