<?php

session_start();
session_destroy();
session_unset();
unset($_SESSION['giris']);

header('location:mainPage.php');

?>