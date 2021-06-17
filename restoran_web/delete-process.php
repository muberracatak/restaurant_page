<?php
include_once 'baglanti2.php';
$sql = "DELETE FROM yemek WHERE yemek_id='" . $_GET["yemek_id"] . "'";
if (mysqli_query($connection, $sql)) {
    echo "Record deleted successfully";
    header('Location: index.php');
        exit();
} else {
    echo "Error deleting record: " . mysqli_error($connection);
}
mysqli_close($connection);
?>