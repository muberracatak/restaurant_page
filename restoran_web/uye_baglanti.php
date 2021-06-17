<?php
$connection = mysqli_connect('localhost','root','','restoran') or die ("baglantı saglanamadi");
mysqli_select_db($connection,'restoran') or die ("veri tabanı baglantisi saglanamadi.");

if(isset($_SESSION['login'])){
    if($_SESSION['login']==5){
        $uye_id = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_SESSION['uye_id']))));
        
        $uyequery = mysql_query("SELECT * FROM uye_tablosu WHERE uye_id='".$uye_id."'");
        
        while($uyesonuc = mysql_fetch_array($uyequery)){
            $uye_name = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['uye_ad']))));
            $uye_surname = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['uye_soyad']))));
            $uye_mail = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['uye_email']))));
            $uye_adres = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['uye_adres']))));
        }
    }
}

?>