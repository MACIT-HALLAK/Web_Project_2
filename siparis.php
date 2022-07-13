<?php require_once 'navbar.php';
include 'databaseConn.php'; 

$stmt = $conn->query("SELECT * FROM trendyolveritabani.siparis ORDER BY id asc ");
$data = $stmt->fetchAll();
$title = 'orderring';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>

<body>
    <div class="container">
        <div class="row mt-5 myTablo">
            <table id="myTablo" class="display" style="margin-top:70px !important">
                <thead>
                    <th class="text-center">İD</th>
                    <th class="text-center">Müşteri İD</th>
                    <th class="text-center">Ürün İD</th>
                    <th class="text-center">FİYAT</th>
                    <th class="text-center">AÇIKLAMA</th>
                    <th class="text-center">TARİH</th>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) {
                        if($row['m_id'] == $_SESSION['id']){ ?>
                        <tr>
                            <td class="text-center"><?php echo $row['id']; ?></td>
                            <td class="text-center"><?php echo $row['m_id']; ?></td>
                            <td class="text-center"><?php echo $row['u_id']; ?></td>
                            <td class="text-center"><?php echo $row['ofiyat']; ?></td>
                            <td class="text-center"><?php echo $row['oaciklama']; ?></td>
                            <td class="text-center"><?php echo $row['otarih']; ?></td>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $("#myTablo").DataTable();
</script>
</html>