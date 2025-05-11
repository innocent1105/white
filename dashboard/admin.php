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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../tailwind.css">
</head>
<body class="min-h-screen bg-gray-100">
    <div class="p-6 mt-24 bg-white shadow-md">
    <h1 class="text-2xl font-bold text-gray-700">Admin dashboard</h1>
        <!-- <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">Admin dashboard</h1>
            <a href="../logout.php" class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded hover:bg-red-700">Logout</a>
        </div> -->
        <div class="my-4 border p-4 w-full">
            <div class="border w-full p-4 my-2 text-gray-500 rounded-md cursor-pointer hover:border-blue-700 hover:shadow transition-all">
                <div class="text-lg font-medium">Applicant name</div>
                <div class="text-sm mt-4">Application Details</div>

                <div class="buttons w-full flex gap-2 mt-4">
                    <button class="p-2 px-4 rounded-md cursor-pointer hover:bg-blue-50 transition-all bg-blue-50 text-blue-500 ">Approve</button>
                    <button class="p-2 px-4 rounded-md cursor-pointer hover:bg-red-50 transition-all bg-red-50 text-red-500">Reject</button>
                </div>
            </div>

            <div class="border w-full p-4 my-2 text-gray-500 rounded-md cursor-pointer hover:border-blue-700 hover:shadow transition-all">
                <div class="text-lg font-medium">Applicant name</div>
                <div class="text-sm mt-4">Application Details</div>

                <div class="buttons w-full flex gap-2 mt-4">
                    <button class="p-2 px-4 rounded-md cursor-pointer hover:bg-blue-50 transition-all bg-blue-50 text-blue-500 ">Approve</button>
                    <button class="p-2 px-4 rounded-md cursor-pointer hover:bg-red-50 transition-all bg-red-50 text-red-500">Reject</button>
                </div>
            </div>
        
        </div>
            
        </div>
    </div>
</body>
</html>
