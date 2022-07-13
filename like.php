<?php
include 'databaseConn.php';
session_start();
$state = true; 
if(isset($_GET['id']) && $_SESSION['giris'] == true)
{
    $id = intval($_GET['id']);
    $musteriId = 0;

    //musteri idsi (giris yapmis musteri) alma islemi
    $quarycek = "select * from trendyolveritabani.register";
    $stmatcek = $conn->prepare($quarycek);
    $stmatcek->execute();
    $resultcek = $stmatcek->fetchAll();
    foreach($resultcek as $key)
    {
        $user = $key['userName'];
        $user = explode("@",$user);
        if($user[0] == $_SESSION['userName']){
            $musteriId = $key['id'];
            break;
        }
    }
    
    //veritabandan veri cekme (kontrolda kullanilacak eger eklenecek veri daha once eklenmisse
    //ozaman bu veriyi sil)
    $quary1 = "select * from trendyolveritabani.favori";
    $stmt1=$conn->prepare($quary1);
    $stmt1->execute();
    $result = $stmt1->fetchAll();

    foreach($result as $element){
        if($id == $element['urunId'] && $musteriId == $element['musteriId'])
        {
            $quary = "DELETE FROM trendyolveritabani.favori WHERE likeId=?";
            $stmt = $conn->prepare($quary);
            $stmt->execute([$element['likeId']]);
            $state = false;
            echo 0;
        }
    }
// eger eklenecek veri veritabaninida yok ise veritabanina ekle
    if($state){
    $quary = "insert into trendyolveritabani.favori (musteriId, urunId) values(?,?)";
    $stmt = $conn->prepare($quary);
    $stmt->execute([$musteriId,$id]);
    echo 1;
    }
    //header("location:listetle.php");
  }
  else {
    echo "lutfen giris olun";
    //header("location:login.php");

  }
   
?>