<?php
include 'databaseConn.php'; 
require_once 'navbar.php';
$data = $conn->query("SELECT * FROM trendyolveritabani.urunlerdb")->fetchAll();
// and somewhere later:
// foreach ($data as $row) {
//     echo $row['id'] . "<br />\n";
// }


// if (isset($_GET['id'])) { // eger bir deger varsa
//     //SQL إعداد القالب لجملة
//     $id = intval($_GET['id']);
//     $sql = "DELETE FROM denizyemekler.balikTb WHERE id=?";
//     $stmt = $db->prepare($sql);
//     $stmt->execute([$id]);


//     echo '<script>alert("silme islemi basarli sekilde ypildi");</script>';
// }
// if ($y = 1) {
//     echo '<script>alert("silindi");</script>';
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .footer {
            background: linear-gradient(0.25turn, #FFFF, #00F2FE);
        }

        a {
            position: relative;
        }

        div {
            transition: after 3s;
            -webkit-transition: after 3s;
        }

        a:hover .bi-trash::after {
            content: "sil";
            background-color: #e6fdff;
            color: #dc3545;
            padding: 10px;
            top: -20px;
            right: -5px;
            border-radius: 50%;
            transform: translate(50%, -50%);
            position: absolute;
        }

        a:hover .bi-pencil-square::after {
            content: "update";
            background-color: #e6fdff;
            color: #198754;
            padding: 10px;
            top: -30px;
            right: -5px;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mb-5">
            <?php foreach ($data as $row) { ?>
                <div class="col-3 mt-4" style="border-radius: 25px !important;">
                    <div class="card border-info rounded">
                        <div class="card-img ">
                            <img src="./imgs/<?php echo $row['ufoto']; ?>" width="100%" alt="<?php echo $row['tag'] ?>">
                            <div class="card-title text-center mt-2 ">
                                <h5><?php if(strlen($row['uaciklama']) > 20)  echo substr($row['uaciklama'], 0, 19) ."..."; else echo $row['uaciklama'];?></h5>
                                <strong><?php echo $row['ufiyat'] ?></strong>
                            </div>
                        </div>
                        <div class="footer bg-dark p-3">
                            <form action="Edit.php" class="d-flex justify-content-around">
                                <a href="update.php?id=<?php echo $row['id']; ?>" id="update_<?= $row['id'] ?>" class="btn btn-success update btn-md rounded-rounded " role="button" name="Upd">update<i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="sil.php?p=remove&product_id=<?php echo $row['id']; ?>" id="sil_<?= $row['id'] ?>" class="btn btn-danger remove btn-md rounded-circle " role="button" name="Del">sil<i class="bi bi-trash"></i>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery.js"></script>
</body>

</html>