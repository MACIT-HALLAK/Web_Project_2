<?php
include "navbar.php";
include 'databaseConn.php'; 
// session_start();
// if (isset($_GET['id'])) { // eger bir deger varsa
//     //SQL إعداد القالب لجملة
//     $id = intval($_GET['id']);
// $sql = "DELETE FROM denizyemekler.balikTb WHERE id=?";
// $stmt = $db->prepare($sql);
// $stmt->execute([$id]);

//     if ($stmt->rowCount()) { // eğer bir satır silinmişse
//         header("Location:Edit.php");
//     } else {
//         echo 2;
//     }
// }

function remove($id)
{
    include 'databaseConn.php'; 
    $sql = "DELETE FROM trendyolveritabani.urunlerdb WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    return true;
}
if (isset($_GET["p"])) {
    $islem = $_GET["p"];
    if ($islem == "remove") {

        $id = $_GET["product_id"];

        //eger bize bir cevap donerse
        if (remove($id)) {
            header("Location:edit.php");
        }
    }
}
