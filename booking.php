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

    // Inisialisasi variabel pencarian
    $searchTerm = "";

    // Cek apakah ada data pencarian yang dikirim
    if (isset($_GET['id'])) {
        $searchTerm = $_GET['id'];

        // Query untuk mengambil data dari tabel users
        $sql = "SELECT * FROM hotel WHERE Hotel_Id = $searchTerm";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data dari setiap baris
            $row = $result->fetch_assoc();
        } else {
            echo "0 results";
        }
    }else {
        header("Location: servicehotel.php");
        exit();
    }

    $jumlah = 


    // Tutup koneksi
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Darmo by AMITHYA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="stylebook.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .popup-form {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            background-color: #fff;
            z-index: 1000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .popup-form input[type="file"] {
            display: block;
            margin-top: 10px;
        }

        .popup-form button {
            margin-top: 10px;
        }

        .close-button {
            background: none;
            border: none;
            font-size: 20px;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    <div class="navbar">
        <div class="nav-left">
            <img src="assets/logoclean.png" width="10%" height="10%" class="logo">
            <h1>Samudra Sagara</h1>
        </div>
        <div class="nav-right">
            <div class="booking-details">
                <span>02 Jul - 03 Jul, 1 night(s)</span>
                <span>1 Adult(s), 0 Child, 1 Room</span>
            </div>
            <a href="servicehotel.php" class="search-button" style="text-decoration: none;"> 
                 Lihat semua Hotel<span class="material-icons">search</span>
            </a>
            
        </div>
    </div>

    <div class="">
        <div class="row">
            <div class="row my-5 px-5">
                <div class="col-md-6">
                    <div class="header">
                        <div>
                            <h2><?= $row['Nama_Hotel'] ?></h2>
                            <div class="location">
                                <p><?= $row["Hoteladdress"] ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="price">
                        <p>Price/room/night starts from</p>
                        <?php 
                            $jumlahDiskon = ($row['Hotel_Rent'] * $row['diskon']) / 100;
                            $hargaAkhir = $row['Hotel_Rent'] - $jumlahDiskon;
                        ?>
                        <p class="amount">Rp <?= number_format($hargaAkhir, 0, ',', '.'); ?></p>
                        <button class="select-room" onclick="openPopup()">Select Room</button>
                    </div>
                </div>
            </div>
            <div class="row mb-5 px-5">
                <div class="main-content">
                    <div class="main-image">
                        <img src="assets/<?= $row['gambar'] ?>" alt="Hotel Image">
                    </div>
                    <div class="side-images">
                        <img src="assets/hotel1.jpg" alt="Side Image 1">
                        <img src="assets/hotel1.jpg" alt="Side Image 2">
                        <img src="assets/hotel1.jpg" alt="Side Image 3">
                        <img src="assets/hotel1.jpg" alt="Side Image 4">
                        <div class="see-all-photos">
                            <a href="#">See All Photos</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-5">
                <div class="hotel-facilities">
                    <h3>Hotel Facilities</h3>
                    <ul>
                        <li><i class="material-icons">wifi</i> Free Wi-Fi</li>
                        <li><i class="material-icons">pool</i> Swimming Pool</li>
                        <li><i class="material-icons">restaurant</i> Restaurant</li>
                        <li><i class="material-icons">fitness_center</i> Fitness Center</li>
                    </ul>
                </div>
                <!-- New Box as Table -->
                <div class="booking-options">
                    <table class="room-options-table">
                        <thead>
                            <tr>
                                <th>Room Option(s)</th>
                                <th>Guest(s)</th>
                                <th>Price/room/night</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <strong>Studio Executive Suite - Advance Purchase</strong><br>
                                Include sarapan<br>
                                    Tidak-Ada pengembalian<br>
                                    1 King Bed
                                </td>
                                <td>
                                    <i class="material-icons">person</i><i class="material-icons">person</i>
                                </td>
                                <td>
                                    <span class="price">Rp 493.000</span><br>
                                    Total Rp 593.620<br>
                                    (Termasuk Pajak & Fee)<br>
                                    <button class="choose-button">Choose</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Studio Executive Suite</strong><br>
                                    include Sarapan<br>
                                    Gratis pengembaian sebelum 1 Jul 2024, 13:59<br>
                                    1 King Bed
                                </td>
                                <td>
                                    <i class="material-icons">person</i><i class="material-icons">person</i>
                                </td>
                                <td>
                                    <span class="price">Rp 586.747</span><br>
                                    Total Rp 618.886<br>
                                    (Termasuk Pajak & Fee)<br>
                                    <button class="choose-button">Choose</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-overlay" id="popupOverlay"></div>
    <div class="popup-form" id="popupForm">
        <button class="close-button" onclick="closePopup()">×</button>
        <h3>Hotel Booking Form</h3>
        <form action="submit_booking.php" method="POST">
            <div class="row">
                <div class="form-group mb-2">
                    <label for="guest_name" class="form-label">Nama Tamu</label>
                    <input type="text" class="form-control" id="guest_name" name="guest_name" required>
                </div>
    
                <div class="form-group mb-2">
                    <label for="checkin" class="form-label">Check-in</label>
                    <input type="date" class="form-control" id="checkin" name="checkin" required>
                </div>

                <input type="hidden" class="form-control" value="hotel" id="tipe_pemesanan" name="tipe_pemesanan" required>
                <input type="hidden" class="form-control" value="<?= $row['Hotel_Id'] ?>" id="tipe_pemesanan" name="hotel_id" required>
    
                <div class="form-group mb-2">
                    <label class="form-label" for="checkout">Check-out</label>
                    <input class="form-control" type="date" id="checkout" name="checkout" required>
                </div>
    
                <div class="form-group mb-2">
                    <label class="form-label" for="guests">Jumlah Tamu</label>
                    <input class="form-control" type="number" id="guests" name="guests" required>
                </div>
    
                <div class="form-group mb-2">
                    <label class="form-label" for="rooms">Jumlah Kamar</label>
                    <input class="form-control" min="1" value="1" type="number" id="rooms" name="rooms" onchange="updateTotal()" required>
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" for="total">Total</label>
                    <input class="form-control" value="<?= round($row['Hotel_Rent']) ?>" type="text" disabled id="total" required>
                    <input class="form-control" value="<?= round($row['Hotel_Rent']) ?>" type="hidden" name="total" id="totalDoc" required>
                </div>
    
                <div class="form-group mb-2">
                    <label class="form-label" for="payment">Preferensi Pembayaran</label>
                    <select class="form-select" id="payment" name="payment" required>
                        <option value="pay_now">Bayar Sekarang</option>
                        <option value="pay_at_hotel">Bayar di Hotel</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-secondary">Pesan Sekarang</button>
            </div>
        </form>
    </div>

    <script>
        let totalDoc = document.getElementById("total");
        let totalDoc2 = document.getElementById("totalDoc");
        let kamarDoc = document.getElementById("rooms");

        function updateTotal() {
            var hargaHotel = '<?= round($row['Hotel_Rent']) ?>'
            var totalHarga = hargaHotel * kamarDoc.value
    
            totalDoc.setAttribute("value", `${totalHarga}`)
            totalDoc2.setAttribute("value", `${totalHarga}`)
        }


        function openPopup() {
            document.getElementById('popupOverlay').style.display = 'block';
            document.getElementById('popupForm').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popupOverlay').style.display = 'none';
            document.getElementById('popupForm').style.display = 'none';
        }
    </script>

</body>
</html>
