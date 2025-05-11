<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="tailwind.css">
<!-- header.php -->
<nav class="bg-blue-600 shadow-md">
    <div class=" fixed top-0 w-full left-0 right-0 bg-blue-600  p-4 mx-auto flex items-center justify-between">
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == "admin"): ?>
        <a href="./admin.php" class="text-white text-2xl font-semibold">Admisssion system</a>
    <?php else: ?>
        <a href="index.php" class="text-white text-2xl font-semibold">Admisssion system</a>
    <?php endif; ?>
        <div class="flex items-center space-x-4">
          
        </div>
    </div>
</nav>
