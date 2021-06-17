<?php

$servername = "localhost";
$username = "root";
$password = "Mub147852.";
$db = "restoran";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$filtre = "";
if (isset($_GET["yemek_ad"])) {
    $filtre .= "and yemek_ad like '" . $_GET["yemek_ad"] . "%' ";
}
if (isset($_GET["yemek_kategori"])) {
    $filtre .= "and yemek_kategori like '" . $_GET["yemek_kategori"] . "%' ";
}


$sql = "
		SELECT * FROM yemek
	";

    //echo $sql;die;


$cvp = mysqli_query($conn, $sql);
if (!$cvp) {
    echo '<br>Hata: ' . mysqli_error($conn);
} else {
?>

<style>

body{
   background:url("restoran.jpg");
   background-size: 100% 100%;
   margin:0 auto; 
   color: black;
   margin: 10;
}

h3{
    color: white;
    font-size: 30px;
    text-align: center;
}
table, th, td {
  border: 2px solid black;
  border-collapse: collapse;
  background-color: #cd853f;
  opacity: 0.9;
  padding: 10px;
  text-align: center;
}
th{
    background-color: #cd853f;
}
.a{
    width: 200px;
    height:35px;
}
.liste{
    margin-left: auto;
    margin-right: auto;
    background-color: #cd853f;
}
.buton{
   color: white;
   margin-top: 1%;
   width: 8%;
   outline: none;
   height: 4vh;
   border-radius: 5px;
   border: none;
   background: linear-gradient(90deg, rgba(29,129,130,1) 0%, #14191d 100%);
}
.buton:hover{
   opacity: 0.7;
}
.buton:active{
   opacity: 0.8;
}

</style>
<body>

    <table class="liste">
    <h3>MENÜ</h3> 
        <thead>
            <tr>
                <th>Yemek Id</th>
                <th>Yemek Ad</th>
                <th>Yemek Kategori</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($cvp)) { ?>
            <?php
            $kitap_kategoriler = "";

            $sql_query = "SELECT * FROM yemek 
                          WHERE yemek.yemek_id = '".$row['yemek_id']."' ";

            $getir = mysqli_query($conn, $sql_query);
            while ($kategori_row = mysqli_fetch_array($getir)) { 
                $kitap_kategoriler .= $kategori_row["yemek_kategori"]. ", ";
            }
            $kitap_kategoriler = rtrim($kitap_kategoriler,", ");
            ?>
                <tr>
                    <td><?= $row["yemek_id"]; ?></td>
                    <td><?= $row["yemek_ad"]; ?></td>
                    <td><?= $row["yemek_kategori"]; ?></td>
                    <td><a href="delete-process.php?yemek_id=<?php echo $row["yemek_id"]; ?>">Delete</a></td>
                    <td><a href="siparis_guncelle.php?yemek_id=<?php echo $row["yemek_id"]; ?>">Edit</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}
?>
</body>