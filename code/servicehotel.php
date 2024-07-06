<?php
    // Konfigurasi database
    $servername = "localhost";
    $username = "root"; 
    $password = "Iph3ng08";    
    $dbname = "samudra_sagara";

    // Disini membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Inisialisasi variabel pencarian
    $searchTerm = "";

    // Cek apakah ada data pencarian yang dikirim
    if (isset($_GET['destination'])) {
        $searchTerm = $_GET['destination'];
    }

    // Query untuk mengambil data dari tabel users
    $sql = "SELECT * FROM hotel WHERE Nama_Hotel LIKE '%$searchTerm%'";
    $result = $conn->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo "0 results";
    }

    // Tutup koneksi
    $conn->close();
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
    <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="stylehotel.css">


  <style>
  </style>
</head>
<body>
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
      
      <div class="container">
        <p style="color: white;"> Explore from Sabang to Merauke</p>
        <nav class="navigation">
            <ul>
                <li><a href="servicehotel.php"class="active">Hotels</a></li>
                <li><a href="serviceflight.php" >Flights</a></li>
                <li><a href="destination.php">Destination</a></li>
            </ul>
        </nav>
      </div>
      
      <div class="search-container">
        <div class="tabs">
            <span class="tab active">Hotel yang Terakhir Dilihat</span>
        </div>
        <div class="search-form">
            <form id="searchForm" method="GET" action="">
                <div class="form-group">
                    <label for="destination">Kota, tujuan, atau nama hotel</label>
                    <input type="text" id="destination" name="destination" placeholder="Kota, hotel, tempat wisata" value="<?= htmlspecialchars($searchTerm) ?>">
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <label for="checkin">Check-in:</label>
                        <input type="date" id="checkin" name="checkin">
                    </div>
                    <div class="form-control">
                        <label for="duration">Durasi</label>
                        <select id="duration" name="duration">
                            <option>1 malam</option>
                            <option>2 malam</option>
                            <option>3 malam</option>
                        </select>
                    </div>
                    <div class="form-control">
                        <label for="checkout">Check-out:</label>
                        <input type="date" id="checkout" name="checkout">
                    </div>
                </div>
                <div class="form-group">
                    <label for="guests">Tamu dan Kamar</label>
                    <input type="text" id="guests" name="guests" placeholder="2 Dewasa, 0 Anak, 1 Kamar">
                </div>
                <div class="form-group">
                    <a href="#" class="payment-option">Bayar di Hotel</a>
                    <button type="submit" class="search-button">Cari Hotel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- <div class="content" style="margin-top: 800px"> -->
    <div class="content" style="margin-top: 1200px">
      <h1>Select Your Hotel</h1>
      <div class="filter-container">
          <button class="filter-button active">Surabaya</button>
          <button class="filter-button">Yogyakarta</button>
          <button class="filter-button">Medan</button>
      </div>
      <div class="hotel-list">
        
            <a href="booking.php?id=<?= $item['Hotel_Id'] ?>" class="hotel-card-link">
    <div class="hotel-card">
        <div class="hotel-image-container">
            <img src="assets/<?= $item['gambar'] ?>" alt="Hotel Image" class="hotel-image">
            <div class="hotel-discount">Hemat <?= $item['diskon'] ?>%</div>
            <div class="hotel-location">Gubeng</div>
        </div>
        <div class="hotel-info">
            <h2 class="hotel-name"><?= $item['Nama_Hotel'] ?></h2>
            <div class="hotel-rating">
                <span class="rating-score">8.2/10</span>
                <span class="rating-count">(590)</span>
                <span class="rating-stars">⭐⭐⭐</span>
            </div>
            <p class="hotel-old-price">Rp. <?= number_format($item['Hotel_Rent'], 0, ',', '.'); ?></p>
              <?php 
                $jumlahDiskon = ($item['Hotel_Rent'] * $item['diskon']) / 100;
                $hargaAkhir = $item['Hotel_Rent'] - $jumlahDiskon;
            ?>
            <p class="hotel-new-price">Rp. <?= number_format($hargaAkhir, 0, ',', '.'); ?></p>
        </div>
    </div>
</a>

  <?php endforeach ?>
      </div>
    </div>

    <footer class="footer">
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
      
</body>
</html>
