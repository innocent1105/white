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
              <a href="index.html">HOME</a>
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
          <li>
              <a href="login.php">LOG IN</a>
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
    <div class="hero-content">
      
    
    <h1 class=" md:text-5xl text-3xl font-bold text-yellow-300 mt-8 ">Welcome To Mumbwa High School</h1>

      
      
    <p>Mumbwa high school is a premier institution dedicated to academic excellence, character development, and holistic education. Established in [year]. Exploring knowledge, shaping character and nuturing dreams at our higher secondary school. A pathway to excellence and a journey of discovery. <br></p><br><br>
    <a href="#Admissions" class="cta-button bg-yellow-500 p-2 px-4 rounded-full text-sm text-white">Apply Now</a>

  </div>
  </section>
   
  <section class="subjects bg-blue-50 md:pb-20 rounded-b-lg">
      <h1 class=" text-black">Subjects we offer</h1>
      <p class=" text-gray-800">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim eum et sunt odio itaque suscipit ipsa eos hic saepe architecto! Nemo veritatis quam ratione ipsam cum placeat sed esse modi!</p>


      <div class="w-full md:px-20 p-2 gap-4 md:flex justify-center">
        <div class="border border-yellow-300 text-blue-500 p-4 md:w-1/3 mt-4 cursor-pointer rounded-md hover:shadow">
          <h3>Pure sciences</h3>
          <p class="text-blue-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa laboriosam, sunt natus beatae voluptas distinctio architecto quas fuga exercitationem atque, culpa velit ducimus, quasi molestiae repellendus minima voluptatibus nesciunt ratione.</p> 
        </div>
        <div class="border border-yellow-300 text-blue-500 p-4 md:w-1/3 mt-4 cursor-pointer rounded-md hover:shadow">
          <h3>Pure sciences</h3>
          <p class="text-blue-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa laboriosam, sunt natus beatae voluptas distinctio architecto quas fuga exercitationem atque, culpa velit ducimus, quasi molestiae repellendus minima voluptatibus nesciunt ratione.</p> 
        </div>
        <div class="border border-yellow-300 text-blue-500 p-4 md:w-1/3 mt-4 cursor-pointer rounded-md hover:shadow">
          <h3>Pure sciences</h3>
          <p class="text-blue-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa laboriosam, sunt natus beatae voluptas distinctio architecto quas fuga exercitationem atque, culpa velit ducimus, quasi molestiae repellendus minima voluptatibus nesciunt ratione.</p> 
        </div>
      </div>



    <!-- <div class="row">
        <div class="subject-col bg-orange-700">
          <h3>pure sciences</h3>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa laboriosam, sunt natus beatae voluptas distinctio architecto quas fuga exercitationem atque, culpa velit ducimus, quasi molestiae repellendus minima voluptatibus nesciunt ratione.</p> 
        </div> 
        <div class="subject-col">
          <h3>Art & Music</h3>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa laboriosam, sunt natus beatae voluptas distinctio architecto quas fuga exercitationem atque, culpa velit ducimus, quasi molestiae repellendus minima voluptatibus nesciunt ratione.</p> 
        </div> 
        <div class="subject-col">
          <h3>Accounts</h3>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa laboriosam, sunt natus beatae voluptas distinctio architecto quas fuga exercitationem atque, culpa velit ducimus, quasi molestiae repellendus minima voluptatibus nesciunt ratione.</p> 
        </div>  
    </div> -->
  </section>

  <!--campus-->
  <section class="campus text-gray-800 ">
    <h1 class=" text-gray-800">Our Local Campus</h1>
    <p class=" text-gray-800">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod et ex est reprehenderit dicta, impedit soluta iure. Consequuntur necessitatibus, perferendis, ducimus repudiandae cum vel enim, vitae voluptate nulla ab earum!</p>
    <div class="row">
      <div class="campus-col">
        
        <div class="layer">
          <img src="./gallery/sch.jpg" class="w-full object-cover" alt="">
        </div>
      </div>
    </div>
 
  </section>

  <section class=" campus bg-black w-full md:p-8 p-2 pt-24">
    <h1 class=" text-gray-200 text-3xl">Get in touch</h1>

    <div class=" flex justify-center w-full gap-20">
    <div class="flex justify-between ">
    <ol class=" mt-5 text-white">
        <li class="">
            <a href="#" class=" flex">
                <img src="./photos/communication.png" class=" w-10 h-10" alt="">
                <span class=" p-4 pt-2 text-gray-400">Follow us on Facebook</span>
            </a>
        </li>
        <li class="">
            <a href="#" class=" flex">    

        <li class="">
            <a href="#" class=" flex">
                <img src="./photos/twitter.png" class=" w-10 h-10 border border-gray-700 rounded-full" alt="">
                <span class=" p-4 pt-2 text-gray-400">Follow us on Twitter</span>
            </a>
        </li>

    </ol>

    </div>

        <form action="" class=" p-4">
            <input type="email" name="" id="" placeholder="Your email address" class=" w-full border border-gray-800 text-gray-200 p-2 rounded-md bg-gray-900">
            <textarea name="" id="" placeholder="Type a message" class=" w-full border border-gray-800 text-gray-200 p-2 rounded-md bg-gray-900 mt-2 resize-none"></textarea>
            <div class="flex justify-left">
                <button type="submit" class=" p-2 text-white bg-blue-700 hover:bg-blue-700 rounded-md w-1/2">Send</button>
            </div>
        </form>
        
   
        <div class="flex justify-between ">
    <ol class=" mt-5 text-white">
        <li class="">
            <a href="#" class=" flex">
                <img src="./photos/communication.png" class=" w-10 h-10" alt="">
                <span class=" p-4 pt-2 text-gray-400">Follow us on Facebook</span>
            </a>
        </li>
        <li class="">
            <a href="#" class=" flex">
                <img src="./photos/instagram.png" class=" w-10 h-10" alt="">
                <span class=" p-4 pt-2 text-gray-400">Follow us on Instagram</span>
            </a>
        </li>

        <li class="">
            <a href="#" class=" flex">
                <img src="./photos/twitter.png" class=" w-10 h-10 border border-gray-700 rounded-full" alt="">
                <span class=" p-4 pt-2 text-gray-400">Follow us on Twitter</span>
            </a>
        </li>

    </ol>

    </div>
    </div>

  </section>
    
    
</body>
</html>