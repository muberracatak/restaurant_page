<html>
<head><meta charset="utf-8"></head>
<body>
<?php
//mysql baglanti kodunu ekliyoruz
include("baglanti2.php");

//sorguyu hazirliyoruz
$sql = "SELECT * FROM yemek";

//sorguyu veritabanina gönderiyoruz.
$cevap = mysqli_query($connection,$sql);

//eger cevap FALSE ise hata yazdiriyoruz.      
if(!$cevap )
{
    echo '<br>Hata:' . mysqli_error($connection);
}

echo "<table border=1>";
echo "<tr><th>Memur ID</th><th>Adı</th><th>Soyadı</th><th>Birimi</th><th>Maaşı</th></tr>";

//veritabanından gelen cevabı satır satır alıyoruz.
while($gelen=mysqli_fetch_array($cevap))
{
    // veritabanından gelen değerlerle tablo satırları oluşturalım
    echo "<tr><td>".$gelen['yemek_ad']."</td>";
    echo "<td>".$gelen['yemek_kategori']."</td>";
    echo "<td>".$gelen['kullanici_email']."</td>";
    echo "<td>".$gelen['kullanici_adres']."</td>";
    echo "<td>".$gelen['kart_sifresi']."</td></tr>";    
}
// tablo kodunu bitirelim.
echo "</table>";

//veritabani baglantisini kapatiyoruz.
mysqli_close($connection);

echo "Yeni kayıt eklemek için <a href='yemek_siparis.html'> Tiklayiniz</a>\n";
?>
</body>
</html>