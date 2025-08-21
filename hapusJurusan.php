<?php
include "koneksi.php";

$id = $_GET ['id'];
$query = "DELETE FROM table_jurusan WHERE id= '$id'";

if($koneksi->query($query)){
    header("location: tampilJurusan.php");
}else{
    echo "Gagal";
}
?>