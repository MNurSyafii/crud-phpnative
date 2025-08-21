<?php
include "koneksi.php";

$id = $_GET ['id'];
$query = "DELETE FROM table_siswa WHERE id = '$id'";

if ($koneksi->query($query)) {
    header("location: tampil.php");
}else{
    echo "Gagal";
}
?>