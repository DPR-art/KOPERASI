<?php 
session_start();
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:index.php?pesan=gagal");
}

?>
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
	require "navbar.php";
    require "../koneksi.php";
    $queryProduk = mysqli_query($koneksi, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b on a.kategori_id=b.id");
	$jumlahProduk = mysqli_num_rows($queryProduk);

    $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
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
			</i> Produk
		</li>
			</ol>
		</nav>
        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Produk</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="produk">Nama Produk</label>
                    <input type="text" id="produk" placeholder="input nama produk"
                    name="produk" class="form-control" autocomplite=off required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">Pilih Satu</option>
                        <?php
                            while($dataKategori=mysqli_fetch_array($queryKategori)){
                        ?>
                            <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                        <?php        
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" id="harga" placeholder="input harga"
                    name="harga" class="form-control" autocomplite=off required>
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" id="foto" name="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" class="form-control" id="detail" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <label for="ketersediaan_stok">Stock</label>
                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                        <option value="tersedia">tersedia
                        </option>
                        <option value="habis">habis</option>
                    </select>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_produk">Simpan</button>
                </div>
            </form>

            <?php 
                if(isset($_POST['simpan_produk'])){
                    $nama = htmlspecialchars($_POST['produk']);
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $harga = htmlspecialchars($_POST['harga']);
                    $detail = htmlspecialchars($_POST['detail']);
                    $stok = htmlspecialchars($_POST['ketersediaan_stok']);
                    $target_dir = '../image/';
                    $nama_file= basename($_FILES['foto']['name']);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $image_size = $_FILES['foto']['size'];
                    $random_name = generateRandomString(10);
                    $new_name = $random_name . ".".$imageFileType;
                    
                    
                    if($nama==''|| $kategori=='' || $harga==''){
            ?>
                         <div class="alert alert-warning" role="alert">
                    Nama,Kategori dan Harga Wajib di isi
                    </div>
            <?php     
                    }
                    else{
                        if($nama_file!=''){
                            if($image_size>500000){
            ?>
                                 <div class="alert alert-warning" role="alert">
                    foto tidak boleh lebih dari 500kb
                            </div>
            <?php
                            }
                            else{
                                if($imageFileType != 'jpg' && $imageFileType!= 'png' && $imageFileType != 'gif'){
            ?>
                                    <div class="alert alert-warning" role="alert">
                                    foto harus berformat jpg,png,gif
                                    </div>    
            <?php     
                                }
                                else{
                                    move_uploaded_file($_FILES['foto']['tmp_name'],$target_dir . $new_name);
                                }
                            }
                        }
                        //insert to produk table
                        $queryTambah = mysqli_query($koneksi,"INSERT INTO produk (kategori_id,nama,harga,foto,detail,ketersediaan_stok) VALUE ('$kategori','$nama','$harga','$new_name','$detail', '$stok')");
                        
                        if($queryTambah){
            ?>
                             <div class="alert alert-primary mt-3" role="alert">
                                Data berhasil disimpan
                            </div>
                            <meta http-equiv='refresh' content='3'>
            <?php
                        }
                    }
                }
            ?>
           
        </div>
        <div class="mt-3">
            <h2>List Produk</h2>
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($jumlahProduk == 0){
                        ?>
                                <tr>
                                    <td colspan=6 class=" text-center">tidak ada data Produk</td>;
                                </tr>
                        <?php        
                            }
                            else{
                                $number = 1;
                                while($data= mysqli_fetch_array($queryProduk)){
                        ?>

                            <tr>
                                <td><?php echo $number; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['nama_kategori']; ?></td>
                                <td><?php echo $data['harga']; ?></td>
                                <td><?php echo $data['ketersediaan_stok']; ?></td>
                                <td>
                                    <a href="produk-detail.php?p=<?php echo $data['id'];?>" class="btn btn-info">Edit
                                </a>
                                    <a href="hapus-produk.php?p=<?php echo $data['id'];?>" class="btn btn-info">Hapus
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