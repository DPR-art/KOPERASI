<?php
session_start(); 

    if($_SESSION['level']==""){
        header("location:index.php?pesan=gagal");
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
	<title>Edit Kategori</title>
</head>
<body>
 
	<a href="kategori.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA KATEGORI</h3>
 
	<?php
	include '../koneksi.php';
	$id = $_GET['p'];
	$data = mysqli_query($koneksi,"select * from kategori where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<table>
				<tr>			
					<td>Nama</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="nama" value="<?php echo $d['nama']; ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Simpan"></td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>