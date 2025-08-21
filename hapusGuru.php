<?php
include "koneksi.php";

$id = $_GET ['id'];
$query = "DELETE FROM table_guru WHERE id = '$id' ";

if($koneksi->query($query)){
    header("location: tampilGuru.php");
}else{
    echo "Gagal";
}
?>