<?php
session_start();
require 'includes/db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['full_name'],
            'role' => $user['role']
        ];
        if ($user['role'] == 'admin') {
            header("Location: dashboard/application.php");
        }
        exit();
    } else {
        $errors[] = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secondary School Website</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="tailwind.css">
    <head>
      <?php include 'includes/header.php'; ?>
      <title>Login</title>
  </head>
</head>
<body class=" body">
  <header class="header-main">
    <div class="flex justify-between p-2 px-4 text-blue-900 ">
      <img src="photos d/badge.png" alt="">
      <nav class="header-main-nav hidden md:block">
        <ul>
          <li>
              <a href="index.php">HOME</a>
          </li>
          <li>
              <a href="about us.html">ABOUT US</a>
          </li>
          <li>
              <a href="Subjects.html">SUBJECTS</a>
          </li>
          <li>
              <a href="sign up.html">SIGN UP</a>
          </li>
        </ul>
      </nav>

      <nav class="md:hidden block pt-3">
        Menu
      </nav>
    </div>
    
    <div class="header-main-sm">
      <div class="header-main-sm-fb"></div>
      <div class="header-main-sm-in"></div>
    </div>

  </header>


  <section class="hero-section">
    <center>
        <h1 class=" md:text-5xl text-3xl font-bold text-yellow-300 my-8 mt-14 ">Welcome To Mumbwa High School Login page</h1>
    </center>
    <div class=" w-full flex justify-center">
      
      
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow">
    <div class=""></div>
    <h2 class="mb-6 text-2xl font-bold ">Admisssion Login</h2>

    <?php if ($errors): ?>
        <div class="mb-4 text-red-500">
            <?php foreach ($errors as $error) echo "<p>$error</p>"; ?>
        </div>
    <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block mb-1 text-sm font-medium">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">Login</button>
        </form>
    </div>

  </div>
  </section>

  


    
    
</body>
</html>