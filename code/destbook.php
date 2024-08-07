<?php 
    $servername = "localhost";
    $username = "root"; 
    $password = "Iph3ng08";     
    $dbname = "samudra_sagara";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $searchTerm = "";

    if (isset($_GET['id'])) {
        $searchTerm = $_GET['id'];

        $sql = "SELECT * FROM destinasi WHERE Destinasi_Id = $searchTerm";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "0 results";
        }
    }else {
        header("Location: servicehotel.php");
        exit();
    }

    $jumlah = 

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
    <link rel="stylesheet" href="styledest.css">
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

            <a href="destination.php" class="search-button" style="text-decoration: none;">
                 Lihat Semua Destinasi<span class="material-icons">search</span>
            </a>
            
        </div>
    </div>

    <div class="container">
        <div class="header">
            <div>
                <h2></h2>
                <div class="location">
                    <p>📍<?= $row['address'] ?></a></p>
                    <p>🕒Open | Tue, 10:00–18:00</a></p>
                </div>
            </div>
        </div>
        <div class="price">
        </div>

        <div class="main-content">
            <div class="main-image">
                <img src="assets/ <?= $row['gambar'] ?>" alt="Hotel Image">
            </div>
            <div class="side-images">
                <img src="assets/ancol2.jpeg" alt="Side Image 1">
                <img src="assets/ancol3.jpeg" alt="Side Image 2">
                <img src="assets/anc.jpg" alt="Side Image 3">
                <img src="assets/ancol.jpg" alt="Side Image 4">
                <div class="see-all-photos">
                    <a href="#">See All Photos</a>
                </div>
            </div>
        </div>
        <div class="details-container">
            <div class="score-map-price">
                <div class="score">
                    <div class="score-circle">
                        <span class="score-value"><?= mt_rand(60, 90) / 10; ?></span>
                    </div>
                    <div class="score-text">
                        <span class="score-label">Excellent</span>
                        <span class="score-reviews">From 17.0K reviews</span>
                    </div>
                </div>
                <div class="map">
                    <a href="#">Lihat Map</a>
                    <p>Pademangan, Jakarta Utara</p>
                </div>
                <div class="price">
                    <span class="current-price">Rp<?= number_format((float)$row['harga'], 0, ',', '.') ?> </span>
                    <button class="find-tickets" onclick="openPopup()">Pesan Tiket</button>
                </div>
            </div>
            <div class="experience-reviews">
                <div class="experience">
                    <h3>Apa yang Akan Anda Alami</h3>
                    <ul>
                        <li><strong>Masuki terowongan yang akan mengirim Anda ke Amerika pada abad ke-19 dengan Kereta Misteri</strong></li>
                        <li><span>Siap-siap merasakan adrenalin dengan lika-likunya</span></li>
                    </ul>
                    <a href="#">Baca Selengkapnya </a>
                </div>
                <div class="reviews">
                    <h3>Review</h3>
                    <div class="review">
                        <p><strong>Alya R. A.</strong></p>
                        <p>Tempat yang menyenangkan untuk menghabiskan waktu bersama keluarga dan teman. Banyak sekali pengalaman dan aktivitas yang bisa kalian lakukan di dufan. Bersenang-senanglah di dufan</p>
                        <div class="review-score">10.0 / 10</div>
                    </div>
                    <div class="review-navigation">
                        <span>●</span>
                        <span>●</span>
                        <span>●</span>
                    </div>
                </div>
            </div>
            <div class="contacts">
                <a href="#">Contacts, Facilities, Service Languages, and More</a>
            </div>
        </div>

    <div class="popup-overlay" id="popupOverlay"></div>
    <div class="popup-form" id="popupForm">
        <button class="close-button" onclick="closePopup()">×</button>
        <h3>Destination Booking Form</h3>
        <form action="submit_booking.html" method="POST">
            <div class="row">
                <div class="form-group mb-2">
                    <label for="guest_name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="guest_name" name="guest_name" required>
                </div>
    
                <div class="form-group mb-2">
                    <label for="asal" class="form-label">Asal</label>
                    <input type="text" class="form-control" id="asal" name="asal" required>
                </div>

                <input type="hidden" class="form-control" value="Destination" id="tipe_pemesanan" name="tipe_pemesanan" required>
                <input type="hidden" class="form-control" name="destinasi_id" required>
    
                <div class="form-group mb-2">
                    <label class="form-label" for="no_hp">No Handphone</label>
                    <input class="form-control" type="text" id="no_hp" name="no_hp" required>
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" for="total">Total</label>
                    <input class="form-control" value="<?= round($row['harga']) ?>" type="text" disabled id="total" required>
                    <input class="form-control" value="<?= round($row['harga']) ?>" type="hidden" name="total" id="totalDoc" required>
                </div>
    
                <div class="form-group mb-2">
                    <label class="form-label" for="payment">Preferensi Pembayaran</label>
                    <select class="form-select" id="payment" name="payment" required>
                        <option value="pay_now">Bayar Sekarang</option>
                        <option value="pay_on_location">Bayar di Lokasi</option>
                    </select>
                </div>

                <button type="submit" name="book_destinasi" class="btn btn-secondary">Pesan Sekarang</button>
            </div>
        </form>
    </div>

    <script>
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
