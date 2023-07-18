<!DOCTYPE html>
<html>

<head>
	<title>Halaman admin - www.malasngoding.com</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../font-awesome/css/fontawesome.min.css">
</head>
<?php
session_start();
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
	header("location:index.php?pesan=gagal");
}

?>
<style>
	.kotak {
		border: solid;
	}

	.summary-kategori {
		background-color: lightblue;
		border-radius: 15px;
	}

	.summary-produk {
		background-color: lightgreen;
		border-radius: 15px;
	}

	.no-decoration {
		text-decoration: none;
	}
</style>

<body>
	<?php
	require "navbar.php";
	require "../koneksi.php";
	$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
	$jumlahKategori = mysqli_num_rows($queryKategori);
	$queryProduk = mysqli_query($koneksi, "SELECT * FROM produk");
	$jumlahProduk = mysqli_num_rows($queryProduk);
	?>
	<div class="container mt-5">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">
					<i class="fas fa-home"></i> Home
				</li>
			</ol>
		</nav>
		<h1>Halaman Admin</h1>

		<p>Halo <b><?php echo $_SESSION['nama']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
		<div class="container mt-4">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-kategori p-3">

						<div class="row">
							<div class="col-6">
								<i class="fas fa-align-justify fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Kategori</h3>
								<p class="fs-4"><?php echo $jumlahKategori; ?> Kategori</p>
								<P><a href="kategori.php" class="no-decoration text-white">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class=" summary-produk p-3">
						<div class="row">
							<div class="col-6">
								<i class="fas fa-box fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Produk</h3>
								<p class="fs-4"><?php echo $jumlahProduk; ?> Produk</p>
								<P><a href="produk.php" class="no-decoration text-white">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../font-awesome/js/all.min.js"></script>
</body>

</html>
<!-- <div class="col-lg-4 summary-produk p-3">
					<div class="row">
						<div class="col-6">
							<i class="fas fa-align-justify fa-7x text-black-50" ></i> 
						</div>
						<div class="col-6 text-white">
							<h3 class="fs-2">Produk</h3>
							<p class="fs-4">20 Produk</p>
							<P><a href="kategori.php" class="no-decoration text-white">Lihat Detail</p>
						</div>
					</div>	
				</div> -->