<?php
//mysql baglanti kodunu ekliyoruz
include("baglanti2.php");

//degiskenleri formdan aliyoruz
extract($_POST);

//sorguyu hazirliyoruz
$sql ="UPDATE yemek ".
      "SET yemek_ad='$ad',yemek_kategori='$kategori'".
      "WHERE yemek_id=".$_GET['yemek_id'];
//sorguyu veritabanina gönderiyoruz.
$cevap = mysqli_query( $connection,$sql);

//eger cevap FALSE ise hata yazdiriyoruz.      
if(!$cevap){
    echo '<br>Hata:' . mysqli_error($baglanti);
}
else{
    echo "Kayıt Güncellendi.";
    echo " <br><a href='listele.php'> Listele</a>\n";
}

//veritabani baglantisini kapatiyoruz.
mysqli_close($baglanti);
?>