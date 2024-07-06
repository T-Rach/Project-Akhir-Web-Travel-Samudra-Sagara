<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT Password FROM CUSTOMER WHERE Email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
            echo "Login berhasil.";
            
        } else {
            echo "Email atau password salah";
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
