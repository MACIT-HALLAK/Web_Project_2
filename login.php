<?php
 include 'head.php';
 include 'databaseConn.php'; 

 session_start();
if(isset($_POST['submit']))
{
    $userna = filter_var($_POST['username']);
    $pass = filter_var($_POST['password']);
    $errors = [];
    if(empty($userna)){
        $errors[0] = "username pos olamaz";
    } 
    if(empty($pass)){ 
        $errors[1] = "password pos olamaz";
    } 
    if(empty($errors)){
        $pass =md5($pass);
      
        $stmt = $conn->prepare("select * from trendyolveritabani.register 
        where userName = ? and password = ?");
        $stmt->execute([$userna,$pass]);
        $state = $stmt->fetch();
		$kontrol = $stmt->rowCount();
        if ($stmt->rowCount() > 0) {
            $userna = explode("@",$userna);
			$_SESSION['userName'] = $userna[0];
            $_SESSION['password'] = $pass;
            $_SESSION['id'] = $state['id'];
			$_SESSION['giris'] = true;		
			header('location:mainPage.php');
			
		} else {
            $errors[2] = "kullanici adi veya sifre hatalidir";
			
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
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body class="body-lo">

    <body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="form-lo" method="POST" action="login.php">
        <h3>Login Here</h3>

        <label id="lab_us" for="username">Username</label>
        <input type="text" placeholder="Email or Phone" name="username">
        <h6 style="color:red"><?php 
        if(isset($_POST['submit'])){
        if(!empty($errors[0] )){
            echo($errors[0]);
        }}
        
        ?></h6>
        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password">
        <h6 style="color:red"><?php
        if(isset($_POST['submit'])){
        if(!empty($errors[1])){
            echo($errors[1]);
        }}
        ?></h6>
        <button type="submit" name="submit">Log In</button>
        <h6 style="color:red"><?php 
        if(isset($_POST['submit'])){
        if(!empty($errors[2] )){
            echo($errors[2]);
        }}
        
        ?></h6>
        <div class="social">
          <div class="go"><i ></i><a style="color:coral; text-decoration:none" href="adminLogin.php">Admin Girisi</a></div>
          <div class="fb"><i ></i><a style="color:white; text-decoration:none" href="register.php">Kayit Ol</a>  </div>
        </div>
    </form>
</body>
</body>
</html>

