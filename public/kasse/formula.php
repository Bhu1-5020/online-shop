<?php
session_start();
require "../products.php";
require "service.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasse service</title>
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    
<h2 class="text-2xl font-bold text-center mt-6">Kasse Service</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">

  <!--  LEFT SIDE: FORM -->
  <div class="bg-white p-6 rounded shadow">
  <form action="../datenprozess/validation.php" method="post" class="space-y-4">
     <!--  Error message -->
      <?php if (!empty($_SESSION['error'])): ?>
          <p class="text-xs text-red-500 mt-1"> Fehlermeldung :
        <?php
         if (is_array($_SESSION['error'])) {
          echo implode('<br>', $_SESSION['error']);
          } else {
          echo $_SESSION['error']; } ?> </p>
          <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
    <!--  Name -->
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block text-sm mb-1">Vorname</label>
        <input type="text" placeholder="Vorname" name="firstName"  class="w-full border p-2 rounded">
        </div>
      <div>
        <label class="block text-sm mb-1">Nachname</label>
        <input type="text" placeholder="Nachname" name="lastName" class="w-full border p-2 rounded">
      </div>
    </div>

    <!--  Email + Phone -->
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block text-sm mb-1">Email</label>
        <input type="email" placeholder="Email" name="email" class="w-full border p-2 rounded">
      </div>
      <div>
        <label class="block text-sm mb-1">Telefon</label>
        <input type="text" placeholder="Telefon" name="phoneNumber" class="w-full border p-2 rounded">
      </div>
    </div>

    <!--  Address -->
    <div>
      <label class="block text-sm mb-1">Straße und Hausnummer</label>
      <input type="text" placeholder="Adresse"  name="addresses" class="w-full border p-2 rounded">
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block text-sm mb-1">Postleitzahl</label>
        <input type="number" placeholder="PLZ" name="plz" class="w-full border p-2 rounded">
      </div>
      <div>
        <label class="block text-sm mb-1">Ort</label>
        <input type="text" placeholder="Ort" name="state" class="w-full border p-2 rounded">
      </div>
    </div>

    <!-- Versand -->
    <div>
      <p class="text-sm mb-2 font-medium">Versandmethode</p>
      <div class="flex gap-6">
        <label class="flex items-center gap-2">
          <input type="radio" name="shipping" value="post">
          Post
        </label>
        <label class="flex items-center gap-2">
          <input type="radio" name="shipping" value="pickup">
          Abholung
        </label>
      </div>
    </div>

    <!--  Payment -->
    <div>
      <p class="text-sm mb-2 font-medium">Bezahlung</p>
      <div class="flex gap-6">
        <label class="flex items-center gap-2">
          <input type="radio" name="payment" value="card">
          Kreditkarte
        </label>
        <label class="flex items-center gap-2">
          <input type="radio" name="payment" value="invoice">
          Rechnung
        </label>
      </div>
    </div>

    <!--  Button -->
    <button class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
      Bestellung abschicken
    </button>

  </form>
</div>

  <!-- RIGHT SIDE: CART -->
  <div class="bg-white p-6 rounded shadow">
    <h3 class="text-lg font-bold mb-4">Deine Produkte</h3>
      
    <?php if (!empty($_SESSION['cart'])): ?>
     <?php foreach ($_SESSION['cart'] as $id => $qty): ?>
            <?php foreach ($products as $p): ?>
                <?php if ($p['id'] == $id): ?>
       <?php $subtotal = $p['preis'] * $qty; ?>
        <div class="border p-3 rounded mb-3">
          <strong><?= $p['name'] ?></strong><br>
            Artikelnummer : <?= $p['artikelnummer'] ?> €<?= $p['preis'] ?> Menge: <?= $qty ?> = 
          <span class="font-bold">€<?= $subtotal ?></span>
           <form action="formula.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="action" value="remove">
            <button type="submit" class="remove-btn">Lösen</button>
          </form>
          
        </div>
       
      <?php 
          endif;
        endforeach;
      endforeach;
      ?>

      <hr class="my-4">

      <h4 class="text-xl font-bold">
        Total: €<?= $totalPrice ?>
      </h4>

    <?php else: ?>
      <p class="text-gray-500">Warenkorb ist leer</p>
    <?php endif; ?>

  </div>

</div>


</body>
</html>