<?php
//mysql baglanti kodunu ekliyoruz
include("mysqlbaglan.php");

//sorguyu hazirliyoruz
$sql = "SELECT * FROM memurlar";

//sorguyu veritabanina gönderiyoruz.
$cevap = mysqli_query($baglanti,$sql);

//eger cevap FALSE ise hata yazdiriyoruz.      
if(!$cevap ){
    echo '<br>Hata:' . mysqli_error($baglanti);
}

//sorgudan gelen tüm kayitlari tablo içinde yazdiriyoruz.
//önce tablo başlıkları oluşturalım
echo "<table border=1>";
echo "<tr>";
echo "<th>Memur ID</th>";
echo "<th>Adı</th>";
echo "<th>Soyadı</th>";
echo "<th>Birimi</th>";
echo "<th>Maaşı</th>";
echo "</tr>";

//veritabanından gelen cevabı satır satır alıyoruz.
while($gelen=mysqli_fetch_array($cevap))
{
    // veritabanından gelenlerle tablo satırları oluşturalım
  echo "<tr><td>".$gelen['memur_id']."</td>";
  echo "<td>".$gelen['ad']."</td>";
  echo "<td>".$gelen['soyad']."</td>";
  echo "<td>".$gelen['birim']."</td>";
  echo "<td>".$gelen['maas']."</td>";
  echo "<td><a href=guncelle.php?id=";
  echo $gelen['memur_id'];
  echo ">Güncelle</a></td></tr>";    
}
// tablo kodunu bitirelim.
echo "</table>";
echo "<br/><a href='anasayfa.php'> Geri Dön</a>";


//veritabani baglantisini kapatiyoruz.
mysqli_close($baglanti);
?>
