<!DOCTYPE html>
<html lang="en">
<head>
	<meta charser="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css?<?php echo time();?>">
	<title>Membuat Login Multi User Level Dengan PHP dan MySQLi - www.malasngoding.com</title>
</head>
<body>
	<?php 
  session_start();
  require 'koneksi.php';

  if(isset($_COOKIE['login_admin']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['login_admin'];
    $key = $_COOKIE['key'];
    $result = mysqli_query($koneksi,"SELECT nama FROM user WHERE id= $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['nama'])){
      header('location:halaman-admin/halaman_admin.php');
    }
  }
  if(isset($_COOKIE['login_user']) && isset($_COOKIE['sulap'])){
    $user = $_COOKIE['login_user'];
    $kunci = $_COOKIE['sulap'];
    $result = mysqli_query($koneksi,"SELECT nama FROM user WHERE id= $user");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($kunci === hash('sha256', $row['nama'])){
      header('location:halaman_user.php');
    }
  }
  
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=='gagal'){
			echo "<script>alert ('email dan Password tidak sesuai !')</script>";
		}
	}
	?>
<div class="container">
<div class="judul">
	<h1>Selamat Datang</h1>
	<h5>di Koper-Asik</h5>
	<img class="img-logo" src="image/Ellipse 2.png">
</div>	
<div class="login-box">
  <h2>Login</h2>
  <form action="cek_login.php" method="post">
    <div class="user-box">
      <input type="email" name="email" required="required">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="required">
      <label>Password</label>
    </div>
    <li class="member">
      <input type="checkbox" name="remember">
      <label>Remember ME?</label>
    </li>
    <p>
	<input class="submit" type="submit" value="submit">
      <!-- <span></span>
      <span></span>
      <span></span>
      <span></span> -->
	<a class="link" href="register.php">register?</a>

      <!-- Submit -->
	</p>
  </form>
</div>
</div>
<!-- partial -->
  
</body>
</html>
 
 
</body>
</html>