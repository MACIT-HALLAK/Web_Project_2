<?php 

$dbHost = "localhost";
$dbUser = "root";
$dbPaas = "";
$dbName = "trenyolveritabani";

try{
    $conn = new PDO("mysql:host$dbHost;dbname:$dbName;charset=utf8",$dbUser,"");

}catch(Exception $ex)
{
    echo( $ex->getMessage());
    exit();

}


?>