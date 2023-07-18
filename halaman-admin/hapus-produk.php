<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['p'];
 
// menghapus data dari database
mysqli_query($koneksi,"delete from produk where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:produk.php");
 
?>