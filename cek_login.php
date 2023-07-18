<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];
// $nama = $_GET['nama'];
$login = mysqli_query($koneksi,"select * from user where email='$email' and password='$password'");
$cek = mysqli_num_rows($login);
if($cek > 0){
    $data = mysqli_fetch_assoc($login);
    if($data['level']=='admin'){
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $email;
        $_SESSION['level']= 'admin';
        if( isset($_POST['remember'])){
            setcookie('login_admin', $data['id'],time()+60);
            setcookie('key',hash('sha256',$data['nama']),time()+60);
        }
        header('location:halaman-admin/halaman_admin.php');
    }else if($data['level']=='user'){
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $email;
        $_SESSION['level']= 'user';
        if( isset($_POST['remember'])){
            setcookie('login_user', $data['id'],time()+60);
            setcookie('sulap',hash('sha256',$data['nama']),time()+60);
        }
        header('location:halaman_user.php');
    }
    else{
        header('location:index.php?pesan=gagal');
    }
}
else{
    header('location:index.php?pesan=gagal');
}
?>