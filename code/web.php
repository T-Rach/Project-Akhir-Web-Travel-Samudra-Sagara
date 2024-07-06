<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <title>Samudra Sagara | Temukan Wisata Mu.</title>
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

    <header class="section__container header__container" id="home">
      <div class="header__image">
        <img src="assets/header.png" alt="header" />
      </div>
      <div class="header__content">
        <h3 class="section__subheader">TUJUAN TERBAIK DI SELURUH DUNIA</h3>
        <h1>Bepergian, menikmati, dan hidup yang baru</h1>
        <p>
          Ini adalah pilihan untuk membebaskan diri dari biasa, meresapi diri
          dalam berbagai budaya, dan merangkul keindahan dunia di sekitar Anda.
          Biarkan setiap perjalanan menjadi bab dalam kisah Anda.
        </p>
      </div>
    </header>

    <section class="section__container service__container" id="service">
      <h3 class="section__subheader">KATEGORI</h3>
      <h2 class="section__header">Kami Menawarkan Layanan Terbaik</h2>
      <div class="service__grid">
        <div class="service__card">
          <img src="assets/weather.png" alt="service" />
          <h4>Prakiraan Cuaca Terhitung</h4>
          <p>
            Tetap di depan perjalanan Anda dengan ramalan cuaca yang tepat
            disesuaikan dengan kondisi tujuan Anda.
          </p>
        </div>
        <div class="service__card">
          <img src="assets/plane.png" alt="service" />
          <h4>Penerbangan Terbaik</h4>
          <p>
            Buka akses eksklusif Anda ke opsi penerbangan optimal yang disusun
            untuk cocok dengan preferensi dan anggaran Anda.
          </p>
        </div>
        <div class="service__card">
          <img src="assets/event.png" alt="service" />
          <h4>Acara Lokal</h4>
          <p>
            Meresapi diri Anda dalam detak jantung tujuan Anda dengan wawasan
            tentang acara dan kejadian lokal dalam perjalanan.
          </p>
        </div>
        <div class="service__card">
          <img src="assets/customisation.png" alt="service" />
          <h4>Penyesuaian</h4>
          <p>
            Sesuaikan perjalanan Anda dengan penyesuaian pribadi, memastikan
            setiap detail mencerminkan gaya perjalanan unik Anda.
          </p>
        </div>
      </div>
    </section>

    <section class="section__container destination__container" id="destination">
      <h3 class="section__subheader">REKOMENDASI</h3>
      <h2 class="section__header">Tujuan Teratas</h2>
      <div class="destination__grid">
        <div class="destination__card">
          <img src="assets/bromo.jpg" alt="destination" />
          <div class="destination__details">
            <div>
              <h4>Bromo, Jawa Timur</h4>
              <h4>Rp5.420k</h4>
            </div>
            <p>
              <span><i class="ri-navigation-fill"></i></span>
              Perjalanan 7 Hari
            </p>
          </div>
        </div>
        <div class="destination__card">
          <img src="assets/bali2.jpg" alt="destination" />
          <div class="destination__details">
            <div>
              <h4>Pantai Kuta, Bali</h4>
              <h4>Rp4.200k</h4>
            </div>
            <p>
              <span><i class="ri-navigation-fill"></i></span>
              Perjalanan 12 Hari
            </p>
          </div>
        </div>
        <div class="destination__card">
          <img src="assets/jogja.jpeg" alt="destination" />
          <div class="destination__details">
            <div>
              <h4>Candi Borobudur, Jogja</h4>
              <h4>Rp15.000k</h4>
            </div>
            <p>
              <span><i class="ri-navigation-fill"></i></span>
              Perjalanan 28 Hari
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container trip__container" id="trip">
      <div class="trip__image">
        <img src="assets/trip.png" alt="trip" />
      </div>
      <div class="trip__content">
        <h3 class="section__subheader">MUDAH & CEPAT</h3>
        <h2 class="section__header">Pesan Perjalanan Anda Berikutnya Dalam 3 Langkah Mudah</h2>
        <ul class="trip__list">
          <li>
            <span><i class="ri-signpost-line"></i></span>
            <div>
              <h4>Pilih Tujuan</h4>
              <p>
                Pilih tujuan impian Anda dari seleksi yang disusun dengan baik
                dari tempat-tempat eksotis, kota-kota yang ramai, dan tempat-tempat
                tenang.
              </p>
            </div>
          </li>
          <li>
            <span><i class="ri-secure-payment-line"></i></span>
            <div>
              <h4>Bayar</h4>
              <p>
                Amankan petualangan Anda dengan mudah melalui proses pembayaran
                yang disederhanakan kami, memastikan pengalaman pemesanan yang
                bebas masalah.
              </p>
            </div>
          </li>
          <li>
            <span><i class="ri-flight-takeoff-line"></i></span>
            <div>
              <h4>Tiba di Bandara pada Tanggal yang Dipilih</h4>
              <p>
                Bersiap untuk terbang saat Anda menyelesaikan rencana perjalanan Anda,
                tiba di bandara pada tanggal yang Anda pilih siap untuk memulai
                perjalanan berikutnya yang tak terlupakan.
              </p>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <section class="section__container client__container" id="client">
      <div class="client__content">
        <h3 class="section__subheader">TESTIMONI</h3>
        <h2 class="section__header">Apa Kata Mereka Tentang Kami</h2>
      </div>
      <div class="client__swiper">
        <!-- Slider main container -->
        <div class="swiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <div class="client__card">
                <img src="assets/client-1.jpg" alt="client" />
                <div class="client__card__content">
                  <p>
                    Memesan perjalanan saya melalui platform ini telah mengubah
                    segalanya! Dari antarmuka intuitif hingga proses pemesanan yang
                    lancar, saya tidak pernah merasa lebih bersemangat untuk menjelajahi
                    tujuan baru.
                  </p>
                  <h4>Emily Watson</h4>
                  <h5>Pecinta Wisata</h5>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="client__card">
                <img src="assets/client-2.jpg" alt="client" />
                <div class="client__card__content">
                  <p>
                    Sebagai seorang profesional sibuk, waktu sangat berharga.
                    Situs web ini membuat perencanaan liburan saya menjadi mudah,
                    memungkinkan saya untuk fokus pada hal yang paling penting:
                    membuat kenangan bersama keluarga saya.
                  </p>
                  <h4>David Nguyen</h4>
                  <h5>Eksekutif Bisnis</h5>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="client__card">
                <img src="assets/client-3.jpg" alt="client" />
                <div class="client__card__content">
                  <p>
                    Saya telah menggunakan layanan ini selama bertahun-tahun, dan
                    itu tidak pernah mengecewakan. Kenyamanan memesan penerbangan,
                    akomodasi, dan aktivitas saya semua dalam satu tempat menghemat
                    waktu dan stres setiap perjalanan.
                  </p>
                  <h4>Michael Johnson</h4>
                  <h5>Penumpang Frekuensi Tinggi</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

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

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
