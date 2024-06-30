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

    $destinasi = "";

    if (isset($_GET['destinasi'])) {
        $destinasi = $_GET['destinasi'];
    }

    $sql = "SELECT * FROM destinasi WHERE Nama_Destinasi LIKE '%$destinasi%'";

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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Aktivitas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="destination-styles.css">
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
    <section class="search-section">
        <div class="overlay"></div>
        <div class="container">
            <h1>Ciptakan momen tak terlupakan dari sini</h1>
            <nav class="navigation">
                <ul>
                    <li><a href="servicehotel.php">Hotels</a></li>
                    <li><a href="serviceflight.php">Flights</a></li>
                    <li><a href="destination.php" class="active">Destination</a></li>
                </ul>
            </nav>
            <form action="" method="GET">
            <div class="search-box">
                <input type="text" name="destinasi" placeholder="Cari aktivitas atau destinasi">
                <button type="submit">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                </button>
            </div>
            </form>
            <div class="location-filter">
                <button class="location-button">Things To Do di</button>
                <button class="location-dropdown">Semua lokasi <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></button>
            </div>
        </div>
    </section>
    <section class="activity-section">
        <div class="container">
            <h2>Saatnya Bertualang!</h2>
            <p>Cek rekomendasi aktivitas keren di berbagai Kota di Indonesia, kuy!</p>
            <div class="country-filters">
                <button class="country-button active">Jakarta</button>
                <button class="country-button">Bandung</button>
                <button class="country-button">Jogja</button>
                <button class="country-button">Makassar</button>
                <button class="country-button">Parepare</button>
                <button class="country-button">Aceh</button>
            </div>
            <div class="activity-cards">
                <?php foreach($data as $item) {?>
                    <div class="activity-card">
                    <a href="destbook.php?id=<?= $item['Destinasi_Id'] ?>" style="text-decoration: none; color: black">
                    <img src="assets/<?= $item['gambar'] ?>" alt="Universal Studios Singapore" class="activity-image">
                    <div class="activity-info">
                        <h3><?= $item['Nama_Destinasi'] ?></h3>
                        <p><?= $item['address'] ?></p>
                        <p><?= mt_rand(30, 50) / 10; ?>/5 (<?= rand(400, 3000) ?> Review)</p>
                        <p class="activity-price">IDR <?= number_format((float)$item['harga'], '0', ',', '.') ?></p>
                    </div>
                </a>
                </div>
                <?php } ?>
            </div>
            <button class="view-all-button">Lihat Semua</button>
        </div>
    </section>
    <footer class="footer">
        <div class="section__container footer__container">
            <div class="footer__col">
                <div class="footer__logo">
                    <img src="assets/logo1.png" width="10%" height="10%" class="logo">
                </div>
                <p>Platform kami adalah paspor Anda untuk petualangan yang lancar, menawarkan seleksi tujuan yang disusun dengan baik dan pengalaman pemesanan yang ramah pengguna.</p>
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
                    <li><a href="#"><i class="ri-facebook-fill"></i></a></li>
                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                    <li><a href="#"><i class="ri-twitter-fill"></i></a></li>
                </ul>
                <h5>Temukan aplikasi kami</h5>
                <div class="footer__discover">
                    <a href="#"><img src="assets/google-play.jpg" alt="discover" /></a>
                    <a href="#"><img src="assets/app-store.jpg" alt="discover" /></a>
                </div>
            </div>
        </div>
        <div class="footer__bar">Hak Cipta © 2024 Menguasai Desain Web. Seluruh hak dilindungi.</div>
    </footer>
</body>
</html>
