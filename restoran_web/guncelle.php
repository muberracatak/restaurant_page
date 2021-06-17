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
<form action="guncelle_kaydet.php?yemek_id=<?php echo $_GET['yemek_id'] ?>" 
method="POST">
Yemek Adı:
<input type="text" name="yemek_ad" value="<?php echo $gelen['yemek_ad']?>" />    <br />
Yemek Kategori:
<input type="text" name="yemek_kategori" value="<?php echo $gelen['yemek_kategori'] ?>" /> <br />
<input type="submit" value="KAYDET"/>
</form>
</body>
</html>