<?php

include "navbar.php";
require_once 'databaseConn.php'; 
$title = 'listele';
$tag="";
if ($_GET['tag']) {
    $tag = $_GET['tag'];
}
/* verileri cekme bolumu  */


$products = $conn->prepare("select * from trendyolveritabani.urunlerdb where tag = ? ");
$products->execute([$tag]);
$state = $products->fetchAll();

// veritabandaki urun sayisi gertiri
$result = $conn->prepare("SELECT count(*) as total from trendyolveritabani.urunlerdb where tag = ? ");
$result->execute([$tag]);
$data = $result->fetch();
$count = $data['total'];
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <p class="ms-5 mt-5 p-txt"><?php echo $tag ?> aramasi icin <?php echo $count ?> sonuc listeleniyor</p>
    <div class="container mt-5 list">
        <div class="row row-01">
            <div class="col-3 mt-2 side px-1 pt-1">
                <div class="col">
                    <div class="sh-1 d-flex justify-content-between">
                        <label for="" class="form-label">FITRES</label>
                        <span class="angle-01"><i class="fa-solid fa-angle-up text-warning fs-2"></i></span>
                    </div>
                </div>
                <div class="fltrs-wrppr hide-fltrs all-fltrs" data-title="all-filtres">
                    <div class="fltrs-wrppr" data-title="Marka">
                        <div class="row">
                            <div class="col">
                                <div class="sh-1 d-flex justify-content-between">
                                    <label for="" class="form-label">Marka</label>
                                    <span class="angle-1"><i class="fa-solid fa-angle-down text-warning fs-2"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="fltrs mt-2 flt">
                            <input class="form-control col w-50" type="text" placeholder="Marka ara" value="">
                            <div class="con-a mt-3">
                                <a class="fltr-item-wrppr" href="/samsung-televizyon-x-b794-c104156">
                                    <div class="form-check">
                                        <div class="chckbox"></div>
                                        <input type="checkbox" class="form-check-input"> Samsung
                                    </div>
                                </a>
                                <a class="fltr-item-wrppr" href="/lg-televizyon-x-b791-c104156">
                                    <div class="form-check">
                                        <div class="chckbox"></div>
                                        <input type="checkbox" class="form-check-input"> LG
                                    </div>
                                </a>
                                <a class="fltr-item-wrppr" href="/philips-televizyon-x-b577-c104156">
                                    <div class="form-check">
                                        <div class="chckbox"></div>
                                        <input type="checkbox" class="form-check-input"> Philips
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    <?php foreach ($state as $key) { ?>
                    <div class="col-12 col-md-6 col-lg-4 mt-2 ">
                        <div class="card p-2 ">
                            <div class="card-head">
                                <span class="badge bg-success m-2 text-wrap" style="width: 4rem;">HIZLI TESLIMAT</span>
                            </div>
                            <img src="./imgs/<?php echo $key['ufoto']; ?>" class="card-img-top" alt="...">
                            <p class="card-text"><?php if(strlen($key['uaciklama']) > 20)  echo substr($key['uaciklama'], 0, 19) ."..."; else echo $key['uaciklama']; ?></p>
                            <div class="card-footer bg-body border-top-0 text-center">
                                <a <?php if(isset($_SESSION['giris']) &&$_SESSION['giris'] == true) { ?>
                                 href="listetle.php?id=<?php echo $key["id"]  ?>"
                                 <?php } else{?>
                                    href="login.php" <?php }?>
                              class="btn border border-warning w-100">SEPETE EKLE <span class="text-warning"><?php echo $key['ufiyat']; ?></span></a>
                              
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
<?php include "footer.php" ?>

</html>