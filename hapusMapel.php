<?php
include "koneksi.php";

$id = $_GET ['id'];
$query = "DELETE FROM table_mapel WHERE id = '$id'";

if ($koneksi->query($query)) {
    header("location: tampilMapel.php");
}else{
    echo "Gagal";
}
?>
