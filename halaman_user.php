<!DOCTYPE html>
<html>

<head>
  <title>Halaman Pegawai - www.malasngoding.com</title>
  <link rel="stylesheet" href="pengguna.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="font-awesome/css/all.min.css">
  <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  .produk {
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
</style>
<body>
  <?php
  //  require "cek_login.php";
  session_start();
  // cek apakah yang mengakses halaman ini sudah login
  if ($_SESSION['level'] == "") {
    header("location:index.php?pesan=gagal");
  }
  require "koneksi.php";
  $queryProduk = mysqli_query($koneksi, "SELECT id,nama,harga,foto,detail FROM produk LIMIT 5");
  require "navbaruser.php";
  ?>

  <?php
  require "swiper.php";
  ?>
  <div class="container-md mt-5">

    <div class="kategori">
      <p>
        <i class="fa-solid fa-store"></i>
        KATEGORI
      </p>
      <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
        <div class="row row-cols-2 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
          <div class="col foto">
            <a href="produk.php?kategori=Seragam">
              <img class="foto" href="produk.php?kategori=Snack" src="image/Group 143.png" alt="">
            </a>
          </div>
          <div class="col foto">
            <a href="produk.php?kategori=Snack">
              <img class="foto" src="image/Group 13 (1).png" alt="">
            </a>
          </div>
          <div class="col foto">
            <a href="produk.php?kategori=Seragam">
              <img class="foto" src="image/Group 143.png" alt="">
            </a>
          </div>
          <div class="col">
            <a href="produk.php?kategori=Alat Tulis" class="foto">
              <img class="bg-pensil" src="image/Group 13.png" alt="">
              <img class="pensil" src="image/Frame.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- tentang kami -->
    <section id="tentang">
      <div class="about">
        <h3>Tentang Kami</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum expedita accusantium quos, dolorum ut iste hic reiciendis ducimus eaque, ipsam harum recusandae nobis optio accusamus et aperiam, aut itaque cupiditate!</p>
      </div>
      <!-- produk -->
      <!-- <div class="produk"> -->
    </section>

    <section id="produk">
      <div class="container-fluid">
        <div class="row produk text-center">
          <p style="z-index: 1;font-size:20px;font-family: 'Poppins', sans-serif;font-weight: 700;color:#F8CBA6;">KATEGORI</p>
          <img class="banner" src="image/Desain tanpa judul (13).png">
        </div>
      </div>
      <!-- <div class="isi-produk"> -->
      <main>
        <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
          <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-5 g-3 menu">
            <?php
            while ($data = mysqli_fetch_array($queryProduk)) { ?>
              <div class="col">
                <div class="card h-75 shadow-sm">
                  <div class="image-box">
                    <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                  </div>
                  <div class="card-body kartu">
                    <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-white text-dark"><?php echo $data['nama']; ?></span> <span class="float-end badge rounded-pill bg-white text-dark">RP. <?php echo $data['harga']; ?></span> </div>
                    <div class="text-center my-4">
                      <button type="button" onclick="tes()" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>">beli!!!</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="myModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content rounded-0">
                    <div class="modal-body bg-4">
                      <div class="d-flex main-content">
                        <div class="bg-image promo-img mr-3" style="background-image: url('image/<?php echo $data['foto']; ?>')"></div>
                        <div>
                          <div class="text-center">
                            <h3><?php echo $data['nama']; ?></h3>
                            <p>
                              <?php echo $data['detail']; ?>
                            </p>
                          </div>
                          <div class="coupon"><?php echo $data['harga']; ?></div>
                          <p>
                            <a href="#" class="btn py-3 btn-primary btn-block">Use a coupon</a>
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
            <?php
            } ?>
          </div>
        </div>
      </main>
    </section>
  </div>

  <!-- Modal -->
  <section>
    <footer class="footer">
      <img src="image/mobil.png" class="car">
      <img src="image/motor.png" class="motor">
      <img src="image/jalan.png" class="road">
    </footer>
  </section>
  <!-- <img class="foto" src="image/Group 143.png" alt="">
    <img class="foto" src="image/Group 13 (1).png" alt="">
    <div class="foto">
          <img class="bg-pensil" src="image/Group 13.png" alt="">
          <img class="pensil" src="image/Frame.png" alt="">
        </div> -->
  <!-- </div>
  </div> -->
  <!-- </div> -->

  <!-- Swiper JS -->

  <!-- Initialize Swiper -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="pengguna.js"></script>
</body>

</html>