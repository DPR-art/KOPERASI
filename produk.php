<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .kategori {
        /* background-color: black; */
        align-items: center;
        height: 30vh;
        padding-top: 30px;
        justify-content: center;
    }

    .banner {
        position: absolute;
        width: 60%;
        transform: translateY(-10px);
    }

    .image-box {
        width: 100%;
    }

    .image-box img {
        height: 165px;
    }

    .kartu {
        position: relative;
        top: -30px;
    }

    .hover-overlay {
        background-color: (0, 0%, 98%, 0.35);
    }

    .modal {
        border-radius: 7px;
        overflow: hidden;
        background-color: transparent;
    }

    .modal .logo a img {
        width: 30px;
    }

    .modal .modal-content {
        background-color: transparent;
        border: none;
        border-radius: 7px;
    }

    .modal .modal-content .modal-body {
        border-radius: 7px;
        overflow: hidden;
        color: #fff;
        padding-left: 0px;
        padding-right: 0px;
        -webkit-box-shadow: 0 10px 50px -10px rgba(0, 0, 0, 0.9);
        box-shadow: 0 10px 50px -10px rgba(0, 0, 0, 0.9);
    }

    .modal .modal-content .modal-body h2 {
        font-size: 18px;
    }

    .modal .modal-content .modal-body p {
        color: #777;
        font-size: 14px;
    }

    .modal .modal-content .modal-body h3 {
        color: #000;
        font-size: 22px;
    }

    .modal .modal-content .modal-body .close-btn {
        color: #000;
    }

    .modal .modal-content .modal-body .promo-img {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 200px;
        flex: 0 0 200px;
    }

    .modal .main-content {
        padding-left: 20px;
        padding-right: 20px;
    }

    .modal .coupon {
        padding: 10px;
        color: #000;
        text-align: center;
        background-color: #fff;
        border: 2px dashed #6c757d;
        margin-bottom: 20px;
    }

    .modal .cancel {
        color: gray;
        font-size: 14px;
    }

    .form-control {
        border: transparent;
    }

    .form-control:active,
    .form-control:focus,
    .form-control:hover {
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
    }

    .btn {
        border-radius: 4px;
        border: none;
    }

    .btn:active,
    .btn:focus {
        outline: none;
        background-color: #F7810A !important;
        color: #FFFFFF !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
    }

    .bg-image {
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
    }

    .logo img {
        width: 70px;
    }

    .bg-4 {
        background: #fff4e4;
    }
</style>

<body>
    <?php
    session_start();
    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:index.php?pesan=gagal");
    }
    require "koneksi.php";
    $queryKategori = mysqli_query($koneksi, "SELECT id,nama FROM kategori LIMIT 4");

    //ambil data dari search
    if (isset($_GET['keyword'])) {
        $queryProduk = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
    }
    //ambil data kategori
    else if (isset($_GET['kategori'])) {
        $queryGetKategoriId = mysqli_query($koneksi, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);
        $queryProduk = mysqli_query($koneksi, "SELECT * FROM produk WHERE kategori_id = '$kategoriId[id]'");
    }
    // default
    else {
        $queryProduk = mysqli_query($koneksi, "SELECT * FROM produk");
    }
    $countData = mysqli_num_rows($queryProduk);
    ?>

    <?php
    require "navbaruser.php";
    ?>

    <div class="container-fluid">
        <div class="row kategori text-center">
            <p style="z-index: 1;font-size:20px;font-family: 'Poppins', sans-serif;font-weight: 700;color:#F8CBA6;">KATEGORI</p>
            <img class="banner" src="image/Desain tanpa judul (13).png">
        </div>
        <div class="row">
            <?php while ($data = mysqli_fetch_array($queryKategori)) { ?>
                <div class="col text-center">
                    <a style="text-decoration: none;" class="hover-overlay" href="produk.php?kategori=<?php echo $data['nama']; ?>">
                        <h5 style="font-family: 'Poppins', sans-serif;font-weight: 600;color:#F8CBA6;"><?php echo $data['nama']; ?></h5>
                    </a>
                </div>
            <?php } ?>
        </div>
        <?php
        if ($countData == 0) {
        ?>
            <h4 class="text-center" style="color: #7C7C7D;margin-top:100px;">Tidak Menemukan Yang Kamu Cari</h4>
        <?php
        } ?>
        <div class="row row-cols-2 row-cols-xs-2 row-cols-sm-3 row-cols-lg-5 g-3 barang">
            <?php while ($gambar = mysqli_fetch_array($queryProduk)) { ?>
                <div class="col mt-5">
                    <div class="card h-75 shadow-sm">
                        <div class="image-box">
                            <img src="image/<?php echo $gambar['foto']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body kartu">
                            <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-white text-dark"><?php echo $gambar['nama']; ?></span> <span class="float-end badge rounded-pill bg-white text-dark">RP. <?php echo $gambar['harga']; ?></span> </div>
                            <div class="text-center my-4">
                                <button type="button" onclick="tes()" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $gambar['id']; ?>">beli!!!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="myModal<?php echo $gambar['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content rounded-0">
                            <div class="modal-body bg-4">
                                <div class="d-flex main-content">
                                    <div class="bg-image promo-img mr-3" style="background-image: url('image/<?php echo $gambar['foto']; ?>')"></div>
                                    <div>
                                        <div class="text-center">
                                            <h3><?php echo $gambar['nama']; ?></h3>
                                            <p>
                                                <?php echo $gambar['detail']; ?>
                                            </p>
                                        </div>
                                        <div class="coupon"><?php echo $gambar['harga']; ?></div>
                                        <p>
                                            <a href="#" class="btn py-3 btn-primary btn-block">YAKIN GAK !!!</a>
                                        </p>
                                        <p class="text-center">
                                            <a href="#" class="cancel" data-dismiss="modal" onclick="cancel()">Sorry, I don't want this.</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="produk.js"></script>
</body>

</html>