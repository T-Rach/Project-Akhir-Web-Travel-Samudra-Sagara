<?php
// Konfigurasi database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username MySQL Anda
$password = "Iph3ng08"; // Sesuaikan dengan password MySQL Anda
$dbname = "samudra_sagara"; // Sesuaikan dengan nama database Anda

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengecek apakah ada data yang dikirim melalui metode GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Ambil nilai dari form
    $from = $_GET['from'];
    $to = $_GET['to'];
    $departure = $_GET['departure'];
    $return = $_GET['return'];
    $passengers = $_GET['passengers'];
    $class = $_GET['class'];

    // Query SQL untuk mencari penerbangan
    $sql = "SELECT * FROM pesawat WHERE Keberangkatan LIKE '%$from%' AND tujuan LIKE '%$to%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Menampilkan hasil pencarian
        echo "<h2>Hasil Pencarian</h2>";
        while($row = $result->fetch_assoc()) {
            var_dump($row);
            echo "<p>Penerbangan dari " . $row['departure_city'] . " ke " . $row['arrival_city'] . " pada " . $row['departure_date'] . " - " . $row['return_date'] . " (" . $row['class'] . ")</p>";
        }
        die();
    } else {
        echo "Tidak ada penerbangan yang ditemukan.";
    }
}

// Tutup koneksi ke database
$conn->close();
?>
