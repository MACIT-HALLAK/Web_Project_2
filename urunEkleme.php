<?php
require_once 'navbar.php';
include "head.php";
include 'databaseConn.php';

$yisim = $yfiyat = $yfoto = $ytag = '';
if (isset($_POST['submit'])) {

    if (empty($_POST['Ytag'])) {
        $yatg = 'Ürün Tag alanı boş olamaz . <br>';
    } else if (isset($_POST['Ytag'])) {
        $ytag = (filter_var($_POST['Ytag'], FILTER_SANITIZE_STRING));
        echo '<script> bootbox.alert(' . $ytag . ')</script>';
    }

    if (empty($_POST['YisimTxt'])) {
        $yisim = 'Ürün isim alanı boş olamaz . <br>';
    } else if (isset($_POST['YisimTxt'])) {
        $yisim = (filter_var($_POST['YisimTxt'], FILTER_SANITIZE_STRING));
        echo '<script> bootbox.alert(' . $yisim . ')</script>';
    }
    if (empty($_POST['YfiyatTxt'])) {
        $yfiyat = 'Ürün fiyat alanı boş olamaz . <br>';
    } else if (isset($_POST['YfiyatTxt'])) {
        $yfiyat = filter_var($_POST['YfiyatTxt'], FILTER_VALIDATE_INT);
    }

    $uploadok = 1;
    if (($_FILES['ufoto']["tmp_name"] != "")) { //------------------------------------hata var
        if (isset($_FILES['ufoto'])) {

            $check = getimagesize($_FILES["ufoto"]["tmp_name"]);
            if ($check !== false) {

                $foto = "foto turu" . $check["mime"] . ".";
                $uploadok = 1;
            } else {
                // $foto =  "bir foto secin lutfen . ";

                $uploadok = 0;
            }
        } else {

            // $foto =  "bir foto secin lutfen . ";
            $uploadok = 0;
        }
    } else {
        $uploadok = 0;
    }
    $foto_name = " ";
    if (
        $uploadok == 1 || file_exists($_FILES["ufoto"]['tmp_name']) ||
        is_uploaded_file($_FILES["ufoto"]["tmp_name"])
    ) {
        $fname = $_FILES["ufoto"]["name"];
        $yfoto = $fname;
        $tmpName = $_FILES["ufoto"]["tmp_name"];
        $ext  = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
        $yeni_isim = $fname;
        $path = "imgs/" . $yeni_isim;
        if (move_uploaded_file($tmpName, $path)) {
            $foto_name = $yeni_isim;
        } else if (empty($errors)) {
            echo  '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
            Dosya yüklenirken bir hata oluşturulmuş
                </div>';
        }
    }
    if (!empty($yisim) && !empty($yfiyat) && !empty($yfoto)) {
        $sql = "INSERT INTO trendyolveritabani.urunlerdb (tag, uaciklama, ufiyat, ufoto) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ytag,$yisim, $yfiyat, $yfoto]);
        echo '<div class="alert alert-success" role="alert">
        Ürünü başarılı bir şekilde eklendi </div>';
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">


<body class="bod">
    <div class="row mb-5">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-group mt-5 col-6 col-xm-3 offset-3 text-info" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <span style="color:red" class="hata"><?php  if (empty($_POST['Ytag'])) echo $yisim ?></span>
                <input type="text" class="form-control col-md-6 mb-3" name="Ytag" placeholder="tag">


                <span style="color:red" class="hata"><?php  if (empty($_POST['YisimTxt'])) echo $yisim ?></span>
                <input type="text" class="form-control col-md-6 mb-3" name="YisimTxt" placeholder="Ürün İsmi">

                <span style="color:red" class="hata"><?php  if (empty($_POST['YfiyatTxt'])) echo $yfiyat ?></span>
                <input type="text" class="form-control col-md-6 " name="YfiyatTxt" placeholder="Ürün Fiyati">
            </div>
            <div class="form-group">
                <label style="color:black" for="yfoto">Ürün Fotoğrafı</label>
                <br>
                <input type="file" name="ufoto" id="yfoto" class="form-control-sm">
            </div>
            <input type="submit" name="submit" value="Ekle" class="btn btn-outline-info btn-block col-12 mt-3 text-uppercase">
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>