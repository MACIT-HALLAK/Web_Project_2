<?php
require "head.php";
require "databaseConn.php";
session_start();

if(isset($_POST['submit']))
{
  $userName = $_POST['username'];
  
  $password = $_POST['password'];
  $aPassword = $_POST['aPassword'];

  $userName = trim($userName);
  
  $errors = [];
  if(empty($userName)){
    $errors[0] = "username bos olamaz";
  }
  if(empty($password)){
    $errors[1] = "password bos olamaz";
  }
  if($aPassword != $password){
    $errors[2] = "sifreler uyusmuyorlar";
  }
  if(empty($errors)){
    $password = md5($password);
    $aPassword = md5($aPassword);

    $stmt = $conn->prepare("insert into trendyolveritabani.register (userName, password) values(?,?)");
    $stmt->execute([$userName,$password]);
    
    $_SESSION['giris'] = true;
            
    header('location:mainPage.php');

  }else{
    $errors[3] = "islem sirasinda bilinmeyen bir hata olustu..";
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
    
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="form-rg" action="register.php" method="POST">
        <h3>Register Here</h3>

        <label for="username">Username</label>
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
        if(!empty($errors[1] )){
            echo($errors[1]);
        }}
        
        ?></h6>
        <label for="aPassword">Agin Password</label>
        <input type="password" placeholder="Reppit Password" name="aPassword">
        <h6 style="color:red"><?php 
        if(isset($_POST['submit'])){
        if(!empty($errors[2] )){
            echo($errors[2]);
        }}
        
        ?></h6>
        <button name="submit">Log In</button>
        <h6 style="color:red"><?php 
        if(isset($_POST['submit'])){
        if(!empty($errors[3] )){
            echo($errors[3]);
        }}
        
        ?></h6>
        <div class="social">
          <div class="go"><i class=""></i><a style="color:coral; text-decoration:none" href="adminRegister.php"></a>Admin Register</div>
          <div class="fb"><i class=""></i><a style="color:white; text-decoration:none" href="login.php">Giriş yap</a>  </div>
        </div>
</body>
</html>