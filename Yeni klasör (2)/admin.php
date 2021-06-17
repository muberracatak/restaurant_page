<?php 
 
include("baglanti.php");
ob_start();
session_start();
 
if(!isset($_SESSION["login"])){
    header("Location:index.html");
}
else {
    echo "<center>Admin sayfasina hosgeldiniz..! ";
 
}
?>