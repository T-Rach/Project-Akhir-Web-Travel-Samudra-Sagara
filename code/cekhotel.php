<?php 
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: loginadmin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Memeriksa Pembayaran</title>
    <link rel="stylesheet" href="styleon.css">
    <link rel="stylesheet" href="body.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="on.html">Samudra Sagara</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="on.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="admin.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-plane"></i></div>
                            Jadwal Penerbangan
                        </a>
                        <a class="nav-link" href="cekhotel.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Cek Kamar
                        </a>
                        <a class="nav-link" href="cekhotel.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Status Pelanggan
                        </a>
                        <a class="nav-link" href="admin.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Cek Pembayaran Flight
                        </a>
                        <a class="nav-link" href="pembayaranhotel.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Cek Pembayaran Hotel
                        </a>
                        <a class="nav-link" href="cekdestinasi.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Cek Pembayaran Destinasi
                        </a>
                        <a class="nav-link" href="logout.phtml">
                            <div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                            Logout
                        </a>
                        
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.php">Login</a>
                                        <a class="nav-link" href="register.php">Register</a>
                                        <a class="nav-link" href="password.php">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Samudra Sagara
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
 
                    </ol>
    <div class="container">
        <h1>Cek Kamar</h1>
        <div class="payments-table">
            <table>
                <thead>
                    <tr>
                        <th>ID Hotel</th>
                        <th>Kamar</th>
                        <th>Tipe Kamar</th>
                        <th>fasilitas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="payments-body">
                
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
