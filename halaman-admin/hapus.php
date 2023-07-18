<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['p'];
 
$queryCheck = mysqli_query($koneksi,"SELECT * FROM produk WHERE kategori_id='$id'");
$dataCount = mysqli_num_rows($queryCheck);
if($dataCount>0){
?>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <div class="alert alert-warning mt-3" role="alert">
    Data tidak bisa di hapus karena terdapat di produk!
    </div>
<?php
die();
} 
// menghapus data dari database
mysqli_query($koneksi,"delete from kategori where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:kategori.php");
 
?>