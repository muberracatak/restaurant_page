<?php
require_once("uye_baglanti.php");                            
session_start();

if(isset($_GET['step'])){
$step = mysqli_real_escape_string($connection,trim($_GET['step']));
}else{
    $step = "";
}

if(isset($_GET['error'])){
    $error = mysqli_real_escape_string($connection,trim($_GET['error']));
    }else{
        $error = "";
    }

switch($step){
  
    case "":
        if(isset($_SESSION['login'])){
            if($_SESSION['login'] == 5){
                header("Location: uye_giris.php");
                exit();
            }
        }
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="tasarm2.css"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Might</title>
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
</head>
<body>

    <?php
    if($error == "1"){
        echo '<div class="alert alert-danger" role="alert">Email hesabı hatalı</div>';
    }elseif($error == "2"){
        echo '<div class="alert alert-warning" role="alert">Şifre veya email alanı boş.</div>';
    }
    ?>

<div class="login">



<form action="index.html?step=basarili" method="POST">
<div class="login-wrap">


	<div class="login">
	<h1>Login</h1>

    	<input type="email" name="email1" placeholder="E-mail" required="required" />
        <input type="password" name="pass" placeholder="Parola" required="required" />
        <a href="uye_giris.php"><input type="submit" class="btn-1" name="login" value="Giriş" id="white" placeholder="submit"/></a>
        <a href="uyeol.php">KAYIT OL</a>
</div>

   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>    
</html>

<?php
break;

case "basarili":

    if(isset($_POST['login'])){

        $mail = addslashes(strip_tags(mysqli_real_escape_string($connection,htmlspecialchars($_POST['email1']))));
        $sifre = addslashes(strip_tags(mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass']))));

       if($mail == "" OR $sifre =="" OR $mail == " " OR $sifre == " "){

        header('Location : index.html?error=2');
        exit();

       }
       
       else if($mail == "admin@hotmail.com" && $sifre == "admin123456")
       {
           
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
           
            $uyeler = mysqli_query($connection,"SELECT * FROM uye_tablosu WHERE uye_email = '".$mail."' AND sifre = '".$sifre."'");
            $bul= mysqli_num_rows($uyeler);

            if($bul > 0){
                $query = mysqli_query($connection,"SELECT * FROM uye_tablosu WHERE uye_email = '".$mail."' AND sifre = '".$sifre."'");

                while($sonuc = mysqli_fetch_array($query)){

                    $_SESSION['uye_id'] = $sonuc['uye_id'];
                    $_SESSION['login'] = 5;
                    header('Location: login.php');
                    exit();

                }
            }

        }else{
            header('Location : login.php?error=1');
            exit();
        }
    }

    else{
        header('Location: login.php');
    }

       }
   
    break;
}


?>