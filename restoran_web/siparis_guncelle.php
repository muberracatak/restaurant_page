<?php
//mysql baglanti kodunu ekliyoruz
include("baglanti2.php");

//sorguyu hazirliyoruz
$sql = "SELECT * FROM yemek WHERE yemek_id=".$_GET['yemek_id'];

//sorguyu veritabanina gönderiyoruz.
$cevap = mysqli_query($connection,$sql);

//eger cevap FALSE ise hata yazdiriyoruz.      
if(!$cevap ){
    echo '<br>Hata:' . mysqli_error($connection);
}


//veritabanından gelen cevabı alıyoruz.
$gelen=mysqli_fetch_array($cevap);
?>
<html>
<body>
<form action="guncelkaydet.php?id=<?php echo $_GET['yemek_id'] ?>" 
method="POST">
Adı:
<input type="text" name="yemek_ad" value="<?php echo $gelen['yemek_ad']?>" />    <br />
Soyadı:
<input type="text" name="yemek_kategori" value="<?php echo $gelen['yemek_kategori'] ?>" /> <br />
<input type="submit" value="KAYDET"/>
</form>
</body>
</html>
