<?php
session_start();
require 'includes/db.php';

// Optional: Block non-admins from accessing this page
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$success = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];
    $hourlyRate = $_POST['hourly_rate']; // Get the hourly rate from the form

    // Validate the fields
    if (empty($name) || empty($email) || empty($password) || empty($hourlyRate)) {
        $errors[] = "All fields are required.";
    } elseif (!is_numeric($hourlyRate) || $hourlyRate <= 0) {
        $errors[] = "Please enter a valid hourly rate.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password, role, hourly_rate) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $email, $hashedPassword, $role, $hourlyRate]);
            $success = true;
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $errors[] = "Email already exists.";
            } else {
                $errors[] = "Registration failed.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header.php'; ?>
    <title>Register User</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow">
        <h2 class="mb-6 text-2xl font-bold text-center">Register New User</h2>

        <?php if ($success): ?>
            <div class="mb-4 text-green-600">User registered successfully.</div>
        <?php endif; ?>

        <?php if ($errors): ?>
            <div class="mb-4 text-red-500">
                <?php foreach ($errors as $error) echo "<p>$error</p>"; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block mb-1 text-sm font-medium">Full Name</label>
                <input type="text" name="full_name" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Role</label>
                <select name="role" class="w-full px-4 py-2 border rounded">
                    <option value="employee">Employee</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Hourly Rate</label>
                <input type="number" name="hourly_rate" required step="0.01" min="0" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-green-600 rounded hover:bg-green-700">Register</button>
        </form>
    </div>
</body>
</html>
