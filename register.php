<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null; 
    $address = isset($_POST['address']) ? $_POST['address'] : null; 

    $sql = "INSERT INTO CUSTOMER (Nama, Email, Password, Customer_Mobile, Alamat, Username) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssss", $username, $email, $password, $phone, $address, $username);

        if ($stmt->execute()) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

