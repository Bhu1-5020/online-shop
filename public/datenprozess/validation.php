<?php 
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $error = [];
    // vorname
    $vorname = trim($_POST['firstName'] ?? '');
    if($vorname ===""){
       $error[] = "Vorname fehlt" ;
       
    }
    if(preg_match("/[0-9]/" , $vorname)){
      $error [] = "Vorname darf keine Zahlen enthalten" ;
      }
   if(empty($error)){
     $vorname = htmlspecialchars($vorname , ENT_QUOTES , 'UTF-8');
   }
     
   // Nachname
    $nachname = trim($_POST['lastName'] ?? '');
    if($nachname ===""){
       $error[] = "Nachname fehlt" ;
    }
    if(preg_match("/[0-9]/" , $nachname)){
      $error [] = "Nachname darf keine Zahlen enthalten" ;
      }
   if(empty($error)){
     $nachname = htmlspecialchars($nachname , ENT_QUOTES , 'UTF-8');
   }
     
     // email 
    $email = trim($_POST['email'] ?? '');
    if($email ===""){
       $error[] = "email fehlt" ;
    }
   
   if(empty($error)){
     $email = htmlspecialchars($email , ENT_QUOTES , 'UTF-8');
   }
     
   //Phone 
    $phone =trim($_POST['phoneNumber'] ?? '');
    if($phone ===""){
       $error[] = "Telefon nummer fehlt" ;
    }
   if(empty($error)){
     $phone = htmlspecialchars($phone , ENT_QUOTES , 'UTF-8');
   }
      //address
    $addresses = trim($_POST['addresses'] ?? '');
    if($addresses ===""){
       $error[] = "address fehlt" ;
    }
   if(empty($error)){
     $addresses = htmlspecialchars($addresses , ENT_QUOTES , 'UTF-8');
   }
      // PLZ
    $plz = trim($_POST['plz'] ?? '');
    if($plz ===""){
       $error[] = "Plz fehlt" ;
    }
    if(!preg_match("/^[0-9]{4}$/", $plz)){
      $error [] = "PLZ muss 4-stelling sein und keine Buchstabe";
    }
   if(empty($error)){
     $plz = htmlspecialchars($plz , ENT_QUOTES , 'UTF-8');
   };
   
   // ort
    $ort =trim($_POST['state'] ?? '');
    if($ort ===""){
       $error[] = "Vorname fehlt" ;
    }
   if(empty($error)){
     $ort = htmlspecialchars($ort , ENT_QUOTES , 'UTF-8');
   }
}
   $_SESSION['clean_data'] = [
       'firstName' => $vorname ,
       'lastName' => $nachname ,
       'email' => $email ,
       'phoneNumber' => $phone,
       'addresses' => $addresses,
       'plz' => $plz,
       'ort' => $ort
   ];
  
if(!empty($error)){
  $_SESSION['error'] = $error ;
  header("Location: ../kasse/formula.php");
  exit();
} else{
   require "confirmation.php" ;
  }
   
?>