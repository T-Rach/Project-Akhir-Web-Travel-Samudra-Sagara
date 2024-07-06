<?php
    // Konfigurasi database
    $servername = "localhost";
    $username = "root"; // Sesuaikan dengan username MySQL Anda
    $password = "Iph3ng08";     // Sesuaikan dengan password MySQL Anda
    $dbname = "samudra_sagara";

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id_pemesanan = $_POST['id_pemesanan'];

    if(isset($_POST['update_flight'])) {
        if(isset($_POST['accept'])) {
            $sql = "UPDATE pemesanan SET status = 'Done' WHERE id_pemesanan = '$id_pemesanan'";
        }else {
            $sql = "UPDATE pemesanan SET status = 'Rejected'  WHERE id_pemesanan = '$id_pemesanan'";
        }
    }else if(isset($_POST['update_destinasi'])) {
        if(isset($_POST['accept'])) {
            $sql = "UPDATE pemesanan SET status = 'Done' WHERE id_pemesanan = '$id_pemesanan'";
        }else {
            $sql = "UPDATE pemesanan SET status = 'Rejected'  WHERE id_pemesanan = '$id_pemesanan'";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: cekdestinasi.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else {
        if(isset($_POST['accept'])) {
            $sql = "UPDATE pemesanan SET status = 'Done' WHERE id_pemesanan = '$id_pemesanan'";
        }else {
            $sql = "UPDATE pemesanan SET status = 'Rejected'  WHERE id_pemesanan = '$id_pemesanan'";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: pembayaranhotel.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }