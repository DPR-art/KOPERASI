<?php 
 
include 'koneksi.php';
 
// error_reporting(0);
 
session_start();

if(isset($_POST['submit'])){
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password == $cpassword){
        mysqli_query($koneksi,"insert into user set 
        nama = '$_POST[nama]',
        email = '$_POST[email]',
        password = '$_POST[password]',
        level = 'user'");
                
        echo "<script>alert('Selamat, registrasi berhasil!')</script>";
    }else{
        echo "<script>alert('Woops! anda salah memasukan pasword.')</script>";
    }
}

    
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="register.css?<?php echo time(); ?>">
 
    <title>Niagahoster Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 600;">Register Now</p>
            <div class="input-group">
                <input type="text" placeholder="nama" name="nama" value="" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="email" name="email" value="" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
        </form>
    </div>
</body>
</html>