<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Gear </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header class="bg-gray-900 text-white p-4">
      <div class="flex justify-between items-center">
         <h1 class="text-xl font-bold">Gaming Gear</h1>
         <!--Search bar -->
         <div class="flex items-center gap-4">
            <form class="flex">
             <input name="search" placeholder="Search..." class="rounded-l-md bg-gray-700 p-1.5 text-sm text-white outline-none">
               <button class="rounded-r-md bg-gray-700 px-3 text-gray-400 hover:text-white">
               <i class="fa fa-search"></i>
              </button>
              </form>
          <!--Warenkorb/chart -->
           <button class="flex items-center gap-2 text-gray-400 hover:text-white">
            <i class="fa fa-shopping-cart text-xl"></i>
             <span class="text-sm font-medium">Warenkorb</span>
          </button>
          </div>    
      </div>
    </header>
  <main>  
    <div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
   <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        <?php require "products.php" ?>
        <?php foreach ($products as $p) : ?>
      <a href="#" class="group">
        <img src= "<?= $p["bild"]; ?>" alt="<?= $p["name"] ?>" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8]" />
        <h3 class="mt-4 text-md font-medium text-gray-900"><?= $p["name"] ?></h3>
        <p class="mt-1 text-lg font-medium text-gray-800"> € <?= $p["preis"] ?></p>
        <p class="mt-1 text-sm  text-gray-500"> Artiklenummer : <?= $p["artikelnummer"] ?></p>
        <p class="mt-1 text-sm  text-gray-500"> In lager : <?= $p["lagerbestand"] ?></p>
         <button class="mt-2 bg-blue-500 text-white px-3 py-1 rounded">In den Warenkorb</button>
      </a>
      <?php endforeach ?>
    </div>
  </div>
</div>
</main> 
<footer class="bg-gray-800 text-white p-10 mt-10">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
        <a href="">AGB</a>
        <a href="">Impressum</a>
        <a href="">Datenschutz</a>
        <a href="">Widerrufsbelehrung</a>
    </div>
  </footer>
</body>
</html>