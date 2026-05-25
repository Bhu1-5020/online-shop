<?php
require "../products.php";
$userInput = $_SESSION['clean_data'] ?? [];
$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bestellbestätigung</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-lg rounded-2xl p-8 max-w-md w-full text-center">

    <h1 class="text-2xl font-bold mb-2">
        Bestellung erfolgreich!
    </h1>

    <p class="text-gray-600 mb-6">
        Vielen Dank für Ihre Bestellung.<br>
        Ihre Bestellung wurde erfolgreich gespeichert.
    </p>

    <!-- Bestellungs Products -->
    <div class="text-left mb-6">
        <h2 class="font-bold mb-2">Produkte:</h2>

        <?php if (!empty($cart)): ?>
            <?php foreach ($cart as $id => $qty): ?>
                <?php foreach ($products as $p): ?>
            <?php if ($p['id'] == $id): ?>
             <p><?= $p['name'] ?> Menge = <?= $qty ?> </p>
          <?php endif; ?>
        <?php endforeach; ?>
           <?php endforeach; ?>
        <?php else: ?>
            <p>Keine Produkte gefunden</p>
        <?php endif; ?>
    </div>
  <a href="../index.php"
       class="block bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
        Zurück zum Shop
    </a>
</div>
</body>
</html>
<?php
unset($_SESSION['cart']);
unset($_SESSION['clear_data']);
unset($_SESSION['total']);
?>
