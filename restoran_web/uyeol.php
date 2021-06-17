<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="tasarm2.css"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Kayıt Ol</title>
</head>
<style>





html { width: 100%; height:100%; overflow:hidden; }

body { 
	width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: url("restoran.jpg");
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
}
.login { 
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -150px 0 0 -150px;
	width:300px;
	height:300px;
    opacity: 1;
}
.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

input { 
	width: 100%; 
	margin-bottom: 10px; 
	background: rgba(0,0,0,0.3);
	border: none;
	outline: none;
	padding: 10px;
	font-size: 13px;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
}
input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

</style>
<body>
    
<div class="login-wrap">

<form action="uyeol.php" method="POST">

<div class="login">
<h1>Kayıt Ol</h1>

    <input type="text" name="uye_ad" placeholder="Adı" required="required" />
    <input type="text" name="uye_soyad" placeholder="Soyadı" required="required" />
    <input type="text" name="uye_email" placeholder="email" required="required" />
    <input type="text" name="uye_adres" placeholder="adres" required="required" />
    <input type="password" name="sifre" placeholder="Parola" required="required" />
    <a href="index.html"><input type="submit" class="btn-1" name="login" value="Giriş" id="white" placeholder="submit"/></a>

</div>
</form>

    
</div>     
   
</body>    
</html>

<?php

	include("baglanti2.php");
    if(isset($_POST["uye_ad"],$_POST["uye_soyad"],$_POST["uye_email"],$_POST["uye_adres"],
    $_POST["sifre"]))
    {
        $ad=$_POST["uye_ad"];
        $soyad=$_POST["uye_soyad"];
        $mail=$_POST["uye_email"];
        $adres=$_POST["uye_adres"];
        $sifre=$_POST["sifre"];


        $ekle="INSERT INTO uye_tablosu(uye_ad, uye_soyad, uye_email,uye_adres, sifre) VALUES ('".$ad."','".$soyad."','".$mail."','".$adres."','".$sifre."')";
        

        $sonuc=mysqli_query($connection,$ekle);
        
        if($sonuc)
        {
             echo "<script>alert('Uyelik basariyla olusturuldu')</script>";
             
             
        }
        else{
            die("uyelik basarisiz".mysqli_connect_error());
           
        
        }

    }

    

?>