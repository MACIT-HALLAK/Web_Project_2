<?php
include 'databaseConn.php';
require_once 'navbar.php';
$title = 'Shopping Cart ';

if(isset($_POST)){
    $stmt = $conn->prepare('select count(*) from trendyolveritabani.basket where m_id=:m_id');
    $stmt->execute(['m_id' => $_SESSION['id']]);
    $total_count = $stmt->fetchColumn();
    $total_price = 0;
}


$kontrol = 0;
?>
<!DOCTYPE html>
<html lang="en">
<body>

    <div class="container shopping">

        <!-- eger sepetimizde urun varsa  -->
        <?php if ($total_count > 0) {

        ?>
            <h2 class="text-center mt-3 ">Sepetenizde <strong class="text-danger card-adet"><?php echo $total_count; ?></strong> ürün bulunmaktadır</h2>
            <hr>
            <div class="container">
                <div class="row mb-5">
                    <div class="col-8 offset-2 ">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <th class="text-center">Açıklama</th>
                                <th class="text-center">Fiyat</th>
                                <th class="text-center">Sepetten Çıkar</th>
                            </thead>
                            <tbody>
                            <?php 
                                $stmt = $conn->prepare("SELECT id FROM trendyolveritabani.register WHERE userName=:userName");
                                $stmt->execute(['userName' => $_SESSION['userName'].'@gmail.com']); 
                                $user = $stmt->fetch();
                                
                                $stmt = $conn->prepare("SELECT * FROM trendyolveritabani.basket WHERE m_id=:m_id");
                                $stmt->execute(['m_id' => $_SESSION['id']]); 
                                $products = $stmt->fetchAll();
                                foreach ($products as $product) {

                                    $total_price += $product['bfiyat'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $product['baciklama']; ?></td>
                                        <td class="text-center"><strong><?php echo $product['bfiyat']; ?> TL</strong></td>
                                        <td class="text-center">
                                            <form action="" method="post">
                                                <a href="shopping-cart.php?product_id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm p-1" style="padding: 0px;">
                                                    <span><i class="bi bi-shield-x"><span class="sepete"> Sepetten Çıkar</span> </i></span>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>

                            <tfoot>
                                <th colspan="2" class="text-end" style="padding: 20px !important">
                                    Toplam adet : <span class="text-danger"><?php echo $total_count; ?></span>
                                </th>
                                <th colspan="3" class="text-end" style="line-height: 3;">
                                    Toplam Tutar : <span class="text-danger "><?php echo $total_price; ?> TL</span>
                                </th>
                            </tfoot>
                        </table>
                    </div>
                    <form action="" method="post">
                        <button type="submit" name="SiVer" class="btn btn-primary btn-block col-4 offset-4 mb-5">Siparis Ver</button>
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <div class="alert alert-info mt-5">
                <strong>Sepetenizde Henüz Ürün Bulunmamaktadır. Eklemek için <a href="listetle.php">Tıklayınız</a></strong>
            </div>
        <?php } ?>

    </div>


<?php
function remove($id)
{
    include 'dataBaseConn.php';
    $sql = "DELETE FROM trendyolveritabani.basket WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    return true;
}
if(isset($_GET["product_id"])) {
        $id = $_GET["product_id"];
        //eger bize bir cevap donerse
        if (remove($id)) {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=shopping-cart.php\">";
        }
}

if(isset($_POST['SiVer'])) {
    $products = $conn->query("SELECT * from trendyolveritabani.basket")->fetchAll();
    foreach ($products as $product) {
        if($product['m_id'] == $_SESSION['id']){
        $sql = "INSERT INTO trendyolveritabani.siparis (m_id, u_id, ofiyat, oaciklama) VALUES (?, ?,?,?)";
        $stmt_2 = $conn->prepare($sql);
        $kontrol = $stmt_2->execute([$_SESSION['id'], $product['u_id'], $product['bfiyat'],$product['baciklama']]);
        }
    }
    
    if($kontrol) {
        $sql = "DELETE FROM trendyolveritabani.basket WHERE m_id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$_SESSION['id']]);
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=shopping-cart.php\">";
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Siparisiniz basarli bir sekilde alindi</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
}


?>
</body>

</html>