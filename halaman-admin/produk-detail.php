<?php
session_start(); 

    if($_SESSION['level']==""){
        header("location:index.php?pesan=gagal");
    }
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

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html> -->
<!DOCTYPE html>
<html>
<head>
	<title>Edit Produk</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
 
    <?php
    require "navbar.php";
	include '../koneksi.php';
	$id = $_GET['p'];
	$queryProduk = mysqli_query($koneksi, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b on a.kategori_id=b.id WHERE a.id='$id'");
	$jumlahProduk = mysqli_num_rows($queryProduk);
    $data= mysqli_fetch_array($queryProduk);

    $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");
    ?>
        
        
        <div class="my-5 col-12 col-md-6 ms-5">
            <a href="produk.php">KEMBALI</a>
            <br/>
            <br/>
            <h3>EDIT DATA Produk</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="produk">Nama Produk</label>
                    <input type="text" id="produk" placeholder="input nama produk"
                    name="produk" class="form-control" autocomplite=off  value="<?php echo $data['nama']?>" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?php echo $data['kategori_id']?>"><?php echo $data['nama_kategori']?></option>
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
                    name="harga" class="form-control" autocomplite=off  value="<?php echo $data['harga']?>" required>
                </div>
                <div>
                    <label for="currentFoto">Foto Produk</label>
                    <img src="../image/<?php echo $data['foto']?>" alt="" width="300px">
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" id="foto" name="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" class="form-control" id="detail" cols="30" rows="10">
                    <?php echo $data['detail']?></textarea>
                </div>
                <div>
                    <label for="ketersediaan_stok">Stock</label>
                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                        <option value="<?php echo $data['ketersediaan_stok']?>"><?php echo $data['ketersediaan_stok']?>
                        </option>
                        <?php
                        if($data['ketersediaan_stok']=='tersedia'){
                        ?>
                            <option value="habis">habis</option>
                        <?php
                        }
                        else{
                        ?>
                            <option value="tersedia">tersedia</option>
                        <?php
                        }
                        ?>
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
                                    $queryUpdate = mysqli_query($koneksi,"UPDATE produk SET foto='$new_name' WHERE id='$id'");
                                }
                            }
                        }
                        //insert to produk table
                        $queryUpdate = mysqli_query($koneksi,"UPDATE produk SET kategori_id='$kategori',nama='$nama',harga='$harga',detail='$detail',ketersediaan_stok='$stok' WHERE id=$id");
                        
                        if($queryUpdate){
            ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Data berhasil disimpan
                            </div>
                            <meta http-equiv='refresh' content='3; url=produk.php'>
            <?php
                        }
                    }
                }
        ?>
        </div>
		