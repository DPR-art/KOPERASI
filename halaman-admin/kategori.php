<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../font-awesome/css/fontawesome.min.css">
</head>
<?php 
session_start();
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:index.php?pesan=gagal");
}

?>
<?php 
	require "navbar.php";
    require "../koneksi.php";
    $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
	$jumlahKategori = mysqli_num_rows($queryKategori);
?>
<style>
    .no-decoration{
        text-decoration:none;
    }
</style>
<body>
<div class="container mt-5">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page">
			<a href="halaman_admin.php" class="no-decoration text-muted"><i class="fas fa-home"></i> Home
        </a></li>
		<li class="breadcrumb-item active" aria-current="page">
			</i> Kategori
		</li>
			</ol>
		</nav>
        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Kategori</h3>
            <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" placeholder="input nama kategori"
                    name="kategori" class="form-control">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>
            <?php 
                if(isset($_POST['simpan_kategori'])){
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $sudahAda = mysqli_query($koneksi,"SELECT nama FROM kategori WHERE nama='$kategori'");
                    $jumlahin = mysqli_num_rows($sudahAda);
                    if($jumlahin > 0 ){
            ?>
                    <div class="alert alert-warning" role="alert">
                    Data sudah tersedia
                    </div>
            <?php
                    }
                else{
                    $querySimpan = mysqli_query($koneksi,"INSERT INTO kategori (nama) VALUES ('$kategori')");
                    if($querySimpan){
                ?>
                        <div class="alert alert-primary mt-3" role="alert">
                        Data berhasil disimpan
                        </div>
                <?php
                    header("Refresh:0");
                    }
                    else{
                        echo mysqli_error($koneksi);
                    }
                }
                }
            ?>
            <!-- <div class="alert alert-primary mt-3" role="alert">
  A simple primary alert—check it out!
</div> -->
        </div>
        <div class="mt-3">
            <h2>List Kategori</h2>
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($jumlahKategori == 0){
                        ?>
                                <tr>
                                    <td colspan=3 class=" text-center">tidak ada data Kategori</td>;
                                </tr>
                        <?php        
                            }
                            else{
                                $number = 1;
                                while($data= mysqli_fetch_array($queryKategori)){
                        ?>

                            <tr>
                                <td><?php echo $number; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td>
                                    <a href="kategori-detail.php?p=<?php echo $data['id'];?>" class="btn btn-info">Edit
                                </a>
                                    <a href="hapus.php?p=<?php echo $data['id'];?>" class="btn btn-info">Hapus
                                </a>
                                </td>
                            </tr>
                        <?php
                                $number++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../font-awesome/js/all.min.js"></script>
</body>
</html>