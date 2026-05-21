<?php require "products.php"; ?> 

<!-- Overlay -->
<div id="cartOverlay"
  class="fixed inset-0 bg-black bg-opacity-40 hidden z-40"
  onclick="closeCart()">
</div>

<!-- Side Cart -->
<div id="cartPanel"
  class="fixed top-0 right-0 h-full w-80 bg-white shadow-xl transform translate-x-full transition-transform duration-300 z-50 p-4">
 <h2 class="text-lg font-bold mb-4">Warenkorb</h2>
 <?php if (!empty($_SESSION['cart'])): ?>
    <?php foreach ($_SESSION['cart'] as $id => $qty): ?>
      <?php foreach ($products as $p): ?>
        <?php if ($p['id'] == $id): ?>
         <div class="border p-2 rounded mb-2">
            <strong><?= $p['name'] ?></strong><br>
            €<?= $p['preis'] ?> * <?= $qty ?>
            <div class="flex items-center gap-2 mt-2" >
              <!-- Increase -->
               <form action="warenkorb/cartUpdate.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="action" value="increase">
                <button class="bg-gray-300 px-2 rounded">+</button>
               </form>
            </div>
          </div>
   <?php endif; ?>
  <?php endforeach; ?>
 <?php endforeach; ?>
<?php else: ?>
    <p class="text-gray-500">Cart is empty</p>
<?php endif; ?>
</div>