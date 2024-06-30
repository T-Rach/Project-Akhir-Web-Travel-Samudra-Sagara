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

    if(isset($_POST['book_destinasi'])) {
        $guest_name = $_POST['guest_name'];
        $asal = $_POST['asal'];
        $no_hp = $_POST['no_hp'];
        $total = $_POST['total'];
        $payment = $_POST['payment'];
        $type = $_POST['tipe_pemesanan'];
        $destinasi_id = $_POST['destinasi_id'];

        $sql = "INSERT INTO pemesanan (nama_customer, tipe_pemesanan, booking_description, flight_id, hotelid, destination_id, preferensi_pembayaran, total, status) 
                VALUES ('$guest_name', '$type', 'Asal : $asal <br> NO HP : $no_hp', null, null, '$destinasi_id', '$payment', '$total', 'On Proccess')";
    }else if(isset($_POST['book_flight'])) {
        $guest_name = $_POST['guest_name'];
        $asal = $_POST['asal'];
        $no_hp = $_POST['no_hp'];
        $total = $_POST['total'];
        $payment = $_POST['payment'];
        $type = $_POST['tipe_pemesanan'];
        $flight_id = $_POST['flight_id'];

        $sql = "INSERT INTO pemesanan (nama_customer, tipe_pemesanan, booking_description, flight_id, hotelid, destination_id, preferensi_pembayaran, total, status) 
                VALUES ('$guest_name', '$type', 'Asal : $asal <br> NO HP : $no_hp', '$flight_id', null, null, '$payment', '$total', 'On Proccess')";
    }else {
        $guest_name = $_POST['guest_name'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $guests = $_POST['guests'];
        $rooms = $_POST['rooms'];
        $total = $_POST['total'];
        $payment = $_POST['payment'];
        $type = $_POST['tipe_pemesanan'];
        $hotel_id = $_POST['hotel_id'];

        $sql = "INSERT INTO pemesanan (nama_customer, tipe_pemesanan, booking_description, flight_id, hotelid, destination_id, preferensi_pembayaran, total, status) 
                VALUES ('$guest_name', '$type', '$checkin - $checkout. <br> Total Guest : $guests <br> Rooms : $rooms', null, '$hotel_id', null, '$payment', '$total', 'On Proccess')";
    }


    if ($conn->query($sql) === TRUE) {
        header("Location: servicehotel.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }