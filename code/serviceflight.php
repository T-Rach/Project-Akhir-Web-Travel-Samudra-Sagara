<?php
    // Konfigurasi database
    $servername = "localhost";
    $username = "root"; // 
    $password = "Iph3ng08";     // 
    $dbname = "samudra_sagara";

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $from = "";
    $to = "";
    $departure = "";
    $return = "";
    $passengers = "";
    $class = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $departure = $_POST['departure'];
        $return = $_POST['return'];
        $passengers = $_POST['passengers'];
        $class = $_POST['class'];
    }

    $sql = "SELECT * FROM pesawat WHERE Keberangkatan LIKE '%$from%' AND tujuan LIKE '%$to%'";
    if($class) {
        $sql = "SELECT * FROM pesawat WHERE Keberangkatan LIKE '%$from%' AND tujuan LIKE '%$to%' AND class = '$class'";
    }
    $result = $conn->query($sql);
    $data = [];
    $item;

    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo "0 results";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Check-in Form</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="styleflight.css">

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
  <header class="header">
    <nav>
      <div class="nav__header">
        <div class="nav__logo">
          <img src="assets/logo1.png" width="10%" height="10%" class="logo"> 
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="web.php">Home</a></li>
        <li><a href="servicehotel.php">Service</a></li>
        <li><a href="index.php">Login</a></li>
        <li><a href="index.php">Sign Up</a></li>
      </ul>
    </nav>
    <div class="container" style="margin-top: 15%">
        <h1>From Southeast Asia to the World, All Yours.</h1>
        <nav class="navigation">
            <ul>
                <li><a href="servicehotel.php">Hotels</a></li>
                <li><a href="serviceflight.php" class="active">Flights</a></li>
                <li><a href="destination.php">Destination</a></li>
            </ul>
        </nav>
        <div class="search-options">
            <button class="search-option active">One-way / Round-trip</button>
            <button class="search-option">Multi-city</button>
        </div>
        <form action="" method="POST">
        <div class="search-form">
            <div class="form-group">
                <label for="from">From</label>
                <div class="input-icon">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 4.418-7 13-7 13s-7-8.582-7-13a7 7 0 0 1 14 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <input type="text" id="from" name="from" placeholder="Jakarta (JKTA)">
                </div>
            </div>
            <div class="form-group">
                <label for="to">To</label>
                <div class="input-icon">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 4.418-7 13-7 13s-7-8.582-7-13a7 7 0 0 1 14 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <input type="text" id="to" name="to" placeholder="Bali / Denpasar (DPS)">
                </div>
            </div>
            <div class="form-group">
                <label for="departure">Departure Date</label>
                <div class="input-icon">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <input type="date" id="departure" name="departure">
                </div>
            </div>
            <div class="form-group">
                <label for="return">Return Date</label>
                <div class="input-icon">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <input type="date" id="return" name="return">
                </div>
            </div>
            <div class="form-group">
                <label for="passengers">Passengers</label>
                <select id="passengers" name="passengers">
                    <option value="Anak">Anak</option>
                    <option value="Dewasa">Dewasa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select id="class" name="class">
                    <option value="economy">Economy</option>
                    <option value="bussiness">Business</option>
                    <option value="first_class">First Class</option>
                </select>
            </div>
            <button type="submit" class="search-button">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                Cari Penerbangan
            </button>
        </div>
    </form>
    </div>
</header>
<div class="activities-container">
    <section class="activity-section">
        <div class="row">
          <?php foreach($data as $item) {?>
            <div class="col-md-6">
                <div class="flight-card">
                    <div class="flight-info">
                       <h3><img src="assets/garuda.jpeg" alt="Logo Maskapai" class="logo-small"><?= $item['Keberangkatan'] ?> - <?= $item['tujuan'] ?></h3>
                        <p>Maskapai: <?= $item['Pesawat'] ?></p>
                        <p>Waktu: <?= $item['Waktu_Keberangkatan'] ?></p>
                        <p>Rp <?= number_format((float)$item['price'], 0, ',', '.') ?>/pax</p>
                        <p>Class: <?= $item['class'] ?></p>
                    </div>
                    <div class="flight-action">
                        <button onclick="openPopup(<?= $item['Flight_Id'] ?>, <?= $item['price'] ?>)">Book Now</button>
                    </div>
                </div>        
            </div>
           <?php } ?>
        </div>
        <!-- Tambahkan flight-card lainnya sesuai kebutuhan -->
    </section>
</div>
    
<footer class="footer" >
  <div class="section__container footer__container">
      <div class="footer__col">
      <div class="footer__logo">
          <img src="assets/logo1.png" width="10%" height="10%" class="logo">
      </div>
      <p>
          Platform kami adalah paspor Anda untuk petualangan yang lancar,
          menawarkan seleksi tujuan yang disusun dengan baik dan pengalaman
          pemesanan yang ramah pengguna.
      </p>
      </div>
      <div class="footer__col">
      <h4>Perusahaan</h4>
      <ul class="footer__links">
          <li><a href="#">Tentang</a></li>
          <li><a href="#">Karir</a></li>
          <li><a href="#">Seluler</a></li>
      </ul>
      </div>
      <div class="footer__col">
      <h4>Kontak</h4>
      <ul class="footer__links">
          <li><a href="#">Bantuan/FAQ</a></li>
          <li><a href="#">Pers</a></li>
          <li><a href="#">Afiliasi</a></li>
      </ul>
      </div>
      <div class="footer__col">
      <ul class="footer__socials">
          <li>
          <a href="#"><i class="ri-facebook-fill"></i></a>
          </li>
          <li>
          <a href="#"><i class="ri-instagram-line"></i></a>
          </li>
          <li>
          <a href="#"><i class="ri-twitter-fill"></i></a>
          </li>
      </ul>
      <h5>Temukan aplikasi kami</h5>
      <div class="footer__discover">
          <a href="#"><img src="assets/google-play.jpg" alt="discover" /></a>
          <a href="#"><img src="assets/app-store.jpg" alt="discover" /></a>
      </div>
      </div>
  </div>
  <div class="footer__bar">
      Hak Cipta © 2024 Menguasai Desain Web. Seluruh hak dilindungi.
  </div>
</footer>

<div class="popup-overlay" id="popupOverlay"></div>
    <div class="popup-form" id="popupForm">
        <button class="close-button" onclick="closePopup()">×</button>
        <h3>Flight Booking Form</h3>
        <form action="submit_booking.php" method="POST">
            <div class="row">
                <div class="form-group mb-2">
                    <label for="guest_name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="guest_name" name="guest_name" required>
                </div>
    
                <div class="form-group mb-2">
                    <label for="asal" class="form-label">Asal</label>
                    <input type="text" class="form-control" id="asal" name="asal" required>
                </div>

                <input type="hidden" class="form-control" value="Flight" id="tipe_pemesanan" name="tipe_pemesanan" required>
                <input type="hidden" class="form-control" id="flight_id" name="flight_id" required>
    
                <div class="form-group mb-2">
                    <label class="form-label" for="no_hp">No Handphone</label>
                    <input class="form-control" type="text" id="no_hp" name="no_hp" required>
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" for="total">Total</label>
                    <input class="form-control" type="text" disabled id="total" required>
                    <input class="form-control" type="hidden" name="total" id="totalDoc" required>
                </div>
    
                <div class="form-group mb-2">
                    <label class="form-label" for="payment">Preferensi Pembayaran</label>
                    <select class="form-select" id="payment" name="payment" required>
                        <option value="pay_now">Bayar Sekarang</option>
                        <option value="pay_on_location">Bayar di Lokasi</option>
                    </select>
                </div>

                <button type="submit" name="book_flight" class="btn btn-secondary">Pesan Sekarang</button>
            </div>
        </form>
    </div>

    <script>
        function openPopup(id, price) {
            document.getElementById('popupOverlay').style.display = 'block';
            document.getElementById('popupForm').style.display = 'block';
            document.getElementById('total').value = price
            document.getElementById('totalDoc').value = price
            document.getElementById('flight_id').value = id
            
        }

        function closePopup() {
            document.getElementById('popupOverlay').style.display = 'none';
            document.getElementById('popupForm').style.display = 'none';
        }
    </script>
      
</body>
</html>
