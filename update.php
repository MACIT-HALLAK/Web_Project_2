<?php

use function PHPSTORM_META\type;

include 'navbar.php';
include 'databaseConn.php';

$id = $_GET['id'];
$sorgu = $conn->prepare("SELECT * FROM trendyolveritabani.urunlerdb where id=:id");
$sorgu->execute(array(":id" => $id));

$row = $sorgu -> fetch(PDO::FETCH_ASSOC);

?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Kayıt Güncelleme</div>
        <div class="panel-body">        
            <form action="" method="POST" class="form-group mt-5 col-6 col-xm-3 offset-3 text-info">
            <div class="form-group mb-3">
                <small class="form-text text-muted fs-6">ürün ismi</small>
                <input type="text" class="form-control col-md-6 mb-3" value="<?php echo $row['uaciklama'] ?>" name="YisimTxt">

                <small class="form-text text-muted fs-6">ürün fiyati</small>
                <input type="text" class="form-control col-md-6 " value="<?php echo $row['ufiyat'] ?>" name="YfiyatTxt">
            </div>
            <button type="submit" class="btn btn-outline-info btn-block col-6 mt-3 text-uppercase">Update</button>
        </form></div>
    </div>
</div>


<?php

if ($_POST) {

    $aciklama = $_POST['YisimTxt'];
    $fiyat = $_POST['YfiyatTxt'];

    $stmt= $conn -> prepare("UPDATE trendyolveritabani.urunlerdb SET uaciklama=:aciklama, ufiyat=:fiyat WHERE id=:id");
    $kontrol = $stmt->execute(array(":aciklama" => $aciklama , ":fiyat" => $fiyat, ":id" => $id));

    if ($kontrol) {
        echo "isleminiz basarli bir sekilde gerceklesti";
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=listetle.php\">";
    }else {
        echo "hata olustu";
    }
    }
    ?>