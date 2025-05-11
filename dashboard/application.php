<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

$adminName = $_SESSION['user']['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../includes/header.php'; ?>
    <title>Application panel</title>
    <link rel="stylesheet" href="../tailwind.css">
</head>
<body class="min-h-screen bg-gray-100">
    <div class="p-6 mt-24 bg-white shadow-md md:mx-32">
        <!-- <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">Admin dashboard</h1>
            <a href="../logout.php" class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded hover:bg-red-700">Logout</a>
        </div> -->
        <div class="my-4 border p-4 w-full">
        <h1 class="text-2xl font-bold">Application form</h1>
        <form action="" method="POST" class="pt-4">
            <label class=" text-md text-gray-700 my-1">Applicant name</label>
            <input type="text" class=" border p-2 text-gray-700 w-full mb-2" placeholder="Enter your name">

            <label class=" text-md text-gray-700">Grade of application</label>
            <select name="" id="" class="border p-2 text-gray-700 w-full mb-2">
                <option value="ict">Grade 8</option>
                <option value="ict">Grade 10</option>
            </select>

            <label class=" text-md text-gray-700">Offered subjects</label>
            <select name="" id="" class="border p-2 text-gray-700 w-full mb-2">
                <option value="ict">Pure Sciences</option>
                <option value="ict">Art and Music</option>
                <option value="ict">Accounts</option>
            </select>
            
            <label class=" text-md text-gray-700 my-1">Result slip</label>
            <input type="file" class=" border p-2 text-gray-700 w-full mb-2" placeholder="Enter your name">

            <input type="submit" value="submit application" class=" p-2 px-4 rounded-md cursor-pointer hover:bg-blue-900 transition-all bg-blue-700 text-white ">
        </form>
        </div>
            
        </div>
    </div>
</body>
</html>
