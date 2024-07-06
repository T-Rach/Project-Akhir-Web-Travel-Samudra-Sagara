<?php
session_start();

if(isset($_SESSION['username'])) {
   header("Location: on.php");
}

// Konfigurasi database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username MySQL Anda
$password = ""; // Sesuaikan dengan password MySQL Anda
$dbname = "samudra_sagara"; // Sesuaikan dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengecek apakah ada data yang dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Query SQL untuk memeriksa pengguna
    $sql = "SELECT * FROM admin WHERE Email='$input_username' AND Password='$input_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $input_username;
        header("Location: on.php"); // Ganti dengan halaman dashboard Anda
    } else {
        $_SESSION['message'] = true;
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css"> 
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="loginadmin.php" method="post">
            <div class="input-group">
                <label for="username">Email</label>
                <input type="email" id="username" name="username" required> 
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div> 
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
