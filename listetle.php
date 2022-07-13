<?php

include "navbar.php";
require_once 'databaseConn.php'; 

$title = 'listele';
$ideys = [''];
$musteriId = 0;
$musteriFavori = "";
$state = true ;
if(isset($_GET['marka']))
{

    $array = $_GET['marka'];
    $eleman = count($array);
    for($i = 0 ; $i<$eleman;$i++)
    {
       
$mark = $conn->query("SELECT * from trendyolveritabani.urunlerdb")->fetchAll();
foreach($mark as $key){
    $marka = $key['uaciklama'];
    $markalar = explode(" ",$marka);
    $company = $markalar[0];
   
    if($company == $array[$i])
       array_push($ideys,$key['id']);
}
}
}
else{
    $mark = $conn->query("SELECT * from trendyolveritabani.urunlerdb")->fetchAll();
    foreach($mark as $key){
    $marka = $key['uaciklama'];
    $markalar = explode(" ",$marka);
    $company = $markalar[0]; 
    array_push($ideys,$key['id']) ;
}
}
/* verileri cekme bolumu  */

// print_r($products);
$products = $conn->query("SELECT * from trendyolveritabani.urunlerdb")->fetchAll();


//giris yapis olan musteri idisini aliyor
$quarycek = "select * from trendyolveritabani.register";
    $stmatcek = $conn->prepare($quarycek);
    $stmatcek->execute();
    $resultcek = $stmatcek->fetchAll();

    
    foreach($resultcek as $key)
    {
        $user = $key['userName'];
        $user = explode("@",$user);
        if(isset( $_SESSION['userName'])){
        if($user[0] == $_SESSION['userName']){
            $musteriId = $key['id'];
            break;
        }
    }
    } 
// veritabandaki urun sayisi gertiri
$result = $conn->query("SELECT count(*) as total from trendyolveritabani.urunlerdb");
$data = $result->fetch();
$count =$data['total'];

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <p class="ms-5 mt-5 p-txt">Toplam ürün sayısı <?php echo count($ideys)-1 ?> sonuc listeleniyor</p>
   
    <div class="container mt-5 list">
        <div class="row row-01">
            <div class="col-3 mt-2 side px-1 pt-1">
                <div class="col">
                    <div class="sh-1 d-flex justify-content-between">
                        <label for="" class="form-label">FILTERS</label>
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
                        <form action="listetle.php" method="get">

                        <div class="fltrs mt-2 flt text-secondary">
                            <input class="form-control col w-50" type="text" placeholder="Marka ara" value="">
                             <div class="con-a mt-3 mar">
                                 <a class="fltr-item-wrppr" href="#"><!--samsung-televizyon-x-b794-c104156 -->
                                     <div class="form-check "style="color:black;">
                                        <div class="chckbox"></div>
                                        <input type="checkbox" name="marka[]" value="samsung" class="form-check-input mar "> Samsung
                                    </div>
                                </a>
                                <a class="fltr-item-wrppr" href=#">
                                    <div class="form-check"style="color:black;">
                                        <div class="chckbox"></div>
                                        <input type="checkbox" name="marka[]" value="LG" class="form-check-input mar"> LG
                                    </div>
                                </a>
                                <a class="fltr-item-wrppr" href="#">
                                    <div class="form-check"style="color:black;">
                                        <div class="chckbox"></div>
                                        <input type="checkbox" name="marka[]" value="Philips" class="form-check-input mar"> Philips
                                    </div>
                                </a>
                             </div>
                            <input class="btn btn-dark" type="submit" id="aramabutt" value="arama yap" ></input>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="row">
                    <?php foreach ($products as $key) {
                        foreach($ideys as $i){
                        if($key['id'] == $i) { ?>
                    <div class="col-12 col-md-6 col-lg-4 mt-2 ">
                        <div class="card p-2 ">
                            <div class="card-head">
                               <span class="badge bg-success m-2 text-wrap" style="width: 4rem;">HIZLI TESLIMAT</span>
                                
                               <?php 
                               if(!isset($_SESSION['admin'])){
                                $quary1 = "select * from trendyolveritabani.favori";
                                $stmt1=$conn->prepare($quary1);
                                $stmt1->execute();
                                $result = $stmt1->fetchAll();
                                
                                $state = true;
                                foreach($result as $eleman)
                               {    
                                    if($eleman['musteriId'] == $_SESSION['id'] && 
                                       $eleman['urunId'] == $key['id']){?>
                                       <a   id="ada_<?= $key['id']; ?>" onclick="likeol( <?= $key['id']; ?> )" style="margin-left:120px; color:red;cursor: pointer;"><i  class="fa-regular fa-star"></i></a>
                                       
                                     <?php  $state = false;
                                       }
                               }
                               if($state)
                               { ?>
                                <a id="ada_<?= $key['id']; ?>" onclick="likeol( <?= $key['id']; ?> )" style="margin-left:120px; color:blue;cursor:pointer;"><i class="fa-regular fa-star"></i></a>

                                       
                              <?php }  }
                               ?>
                                       
                    
                                    </div>
                            <a href="comments.php?id=<?php echo $key['id']?>"><img src="./imgs/<?php echo $key['ufoto']; ?>" class="card-img-top" alt="..."></a>
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
                    <?php }}} ?>
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>

<?php 
if(isset($_GET['id'])){
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM trendyolveritabani.urunlerdb WHERE id=:id");
$stmt->execute(['id' => $id]); 
$user = $stmt->fetch();

// $stmt = $conn->prepare("SELECT id FROM trendyolveritabani.register WHERE userName=:userName");
// $stmt->execute(['userName' => $_SESSION['userName'].'@gmail.com']); 
// $user_1 = $stmt->fetch();

$sql = "INSERT INTO trendyolveritabani.basket (u_id,m_id,bfiyat, baciklama) VALUES (?,?,?,?)";
$stmt_2 = $conn->prepare($sql);
$kontrol = $stmt_2->execute([$id,$_SESSION['id'],$user['ufiyat'],$user['uaciklama']]);

if($kontrol) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=listetle.php\">";
}
else {
    echo "hata olust";
}

}


?>

<?php include "footer.php" ?>
</html>