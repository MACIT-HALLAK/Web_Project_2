<?php
require_once 'navbar.php';
include 'databaseConn.php';
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sorgu = $conn->prepare("SELECT * FROM trendyolveritabani.urunlerdb where id=:id");
    $sorgu->execute(array(":id" => $id));

    $row = $sorgu->fetch(PDO::FETCH_ASSOC);

    $gid = $row['id'];

    function setComments($conn)
    {
        if (isset($_POST['commentSubmit'])) {
            $uid = $_POST['uid'];
            $message = $_POST['message'];

            $sql = "INSERT INTO trendyolveritabani.comments (uid,message) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$uid, $message]);
        }
    }

    function getComments($conn, $gid)
    {
        $products = $conn->query("SELECT * from trendyolveritabani.comments where uid=$gid")->fetchAll();
        foreach ($products as $key) {
            echo "<div class='comment-box'><p>";
            echo $key['uid'] . "<br>";
            echo $key['date'] . "<br>";
            echo $key['message'];
            echo "</p></div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container comment mt-2">
        <div style="width:400px; height:500px" class="panel-1 ">
            <div class="card" style="width: 15rem;">
                <img style="height:250px"" src="./imgs/<?php echo $row['ufoto'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><?php echo $row['uaciklama'] ?></p>
                </div>
            </div>
            <br>
            <?php echo "<form method='POST' action='" . setComments($conn) . "'>
                <input type='hidden' name='uid' value='" . $row['id'] . "'>
                <textarea name='message' ></textarea><br>
                <button type='submit' name='commentSubmit'>Comment</button>
                </form>";
            ?>
        </div>
        <?php getComments($conn, $gid) ?>
    </div>

</body>

</html>