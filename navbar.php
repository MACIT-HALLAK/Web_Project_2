<?php

include "head.php";
include 'databaseConn.php';
session_start();
$durum = "";
$admin = false;
if (isset($_SESSION['giris']) && isset($_SESSION['userName'])) {
    $durum = $_SESSION['giris'];

    if (isset($_SESSION['admin'])) {
        $admin = $_SESSION['admin'];
    }
}
else {
    $_SESSION['id'] = 0;
}

$stmt = $conn->prepare('select count(*) from trendyolveritabani.basket where m_id=:m_id');
$stmt->execute(['m_id' => $_SESSION['id']]);
$total_count = $stmt->fetchColumn();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <img src="img/logo.png" alt="logo" class="rounded-circle nav-img">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="mainPage.php">ANA SAYFA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listetle.php">LİSTELEME</a>
                </li>
                <?php if ($admin) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="urunEkleme.php">EKLEME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit.php">EDİT</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="iletisim.php">İLETİŞİM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">HAKKIMIZDA</a>
                </li>
                <?php if ($durum == false) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">GİRİŞ</a>
                    </li>
                <?php } ?>
                <?php if ($durum == true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="siparis.php">SİPARİŞ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">ÇIKIŞ</a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="shopping-cart.php">
                            <span><i class="fa-solid fa-cart-shopping fs-3"></i></span>
                            <span class="badge bg-info rounded-pill cart-count position-absolute top-0"><?php echo $total_count; ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2 nav-input" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>