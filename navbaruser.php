<?php
require "koneksi.php";

$queryNama = mysqli_query($koneksi, "SELECT nama FROM user");
$data = mysqli_fetch_array($queryNama);
?>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

	:root {
		--font1: 'Heebo', sans-serif;
		--font2: 'Fira Sans Extra Condensed', sans-serif;
		--font3: 'Roboto', sans-serif
	}

	h2 {
		font-weight: 900
	}

	.container-fluid {
		max-width: 1200px
	}

	.img-brand {
		display: flex;
		justify-content: center;
		align-items: center;
		margin-left: 50px;
	}

	.brand {
		height: 70px;
		position: absolute;
		transform: translateX(-65px);
		bottom: -3px;
	}

	.card {
		background: #FAD9A8;
		box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
		transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
		border: 0;
		border-radius: 1rem
	}

	.card-img,
	.card-img-top {
		border-top-left-radius: calc(1rem - 1px);
		border-top-right-radius: calc(1rem - 1px)
	}

	.card h5 {
		overflow: hidden;
		height: 56px;
		font-weight: 900;
		font-size: 1rem
	}

	.card-img-top {
		width: 100%;
		max-height: 180px;
		object-fit: contain;
		padding: 30px
	}

	.card h2 {
		font-size: 1rem
	}

	.card:hover {
		transform: scale(1.05);
		box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06)
	}

	.label-top {
		position: absolute;
		background-color: #8bc34a;
		color: #fff;
		top: 8px;
		right: 8px;
		padding: 5px 10px 5px 10px;
		font-size: .7rem;
		font-weight: 600;
		border-radius: 3px;
		text-transform: uppercase
	}

	.top-right {
		position: absolute;
		top: 24px;
		left: 24px;
		width: 90px;
		height: 90px;
		border-radius: 50%;
		font-size: 1rem;
		font-weight: 900;
		background: #ff5722;
		line-height: 90px;
		text-align: center;
		color: white
	}

	.top-right span {
		display: inline-block;
		vertical-align: middle
	}

	@media (max-width: 768px) {
		.card-img-top {
			max-height: 250px
		}
	}

	.over-bg {
		background: rgba(53, 53, 53, 0.85);
		box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
		backdrop-filter: blur(0.0px);
		-webkit-backdrop-filter: blur(0.0px);
		border-radius: 10px
	}

	.btn {
		font-size: 1rem;
		font-weight: 500;
		text-transform: uppercase;
		padding: 5px 50px 5px 50px
	}

	.box .btn {
		font-size: 1.5rem
	}

	@media (max-width: 1025px) {
		.btn {
			padding: 5px 40px 5px 40px
		}
	}

	@media (max-width: 250px) {
		.btn {
			padding: 5px 30px 5px 30px
		}
	}

	.btn-warning {
		background: none #f7810a;
		color: #ffffff;
		fill: #ffffff;
		border: none;
		text-decoration: none;
		outline: 0;
		box-shadow: -1px 6px 19px rgba(247, 129, 10, 0.25);
		border-radius: 100px
	}

	.btn-warning:hover {
		background: none #ff962b;
		color: #ffffff;
		box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35)
	}

	.bg-success {
		font-size: 1rem;
		background-color: #f7810a !important
	}

	.bg-danger {
		font-size: 1rem
	}

	.price-hp {
		font-size: 1rem;
		font-weight: 600;
		color: darkgray
	}

	.amz-hp {
		font-size: .7rem;
		font-weight: 600;
		color: darkgray
	}

	.fa-question-circle:before {
		color: darkgray
	}

	.fa-plus:before {
		color: darkgray
	}

	.box {
		border-radius: 1rem;
		background: #fff;
		box-shadow: 0 6px 10px rgb(0 0 0 / 8%), 0 0 6px rgb(0 0 0 / 5%);
		transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12)
	}

	.box-img {
		max-width: 300px
	}

	.thumb-sec {
		max-width: 300px
	}


	@media (max-width: 576px) {
		.box-img {
			max-width: 200px
		}

		.thumb-sec {
			max-width: 200px
		}
	}

	.inner-gallery {
		width: 60px;
		height: 60px;
		border: 1px solid #ddd;
		border-radius: 3px;
		margin: 1px;
		display: inline-block;
		overflow: hidden;
		-o-object-fit: cover;
		object-fit: cover
	}

	@media (max-width: 370px) {
		.box .btn {
			padding: 5px 40px 5px 40px;
			font-size: 1rem
		}
	}

	.disclaimer {
		font-size: .9rem;
		color: darkgray
	}

	.related h3 {
		font-weight: 900
	}

	footer {
		background: #212529;
		height: 80px;
		color: #fff
	}

	body {
		background: #FBFEFF;
		font-family: var(--font3);
	}

	.border {
		border-radius: 50%;
	}

	.form-inline {
		display: inline-block;
	}

	.navbar-header.col {
		padding: 0 !important;
	}

	.navbar {
		background: #fff;
		padding-top:15px ;
		padding-bottom: 15px;
		padding-left: 16px;
		padding-right: 16px;
		border-bottom: 1px solid #d6d6d6;
		box-shadow: 0 0 4px rgba(0, 0, 0, .1);
	}

	.nav-link img {
		border-radius: 50%;
		width: 36px;
		height: 36px;
		margin: -8px 0;
		float: left;
		margin-right: 10px;
	}

	.navbar .navbar-brand {
		color: #555;
		padding-left: 0;
		padding-right: 50px;
		font-family: 'Merienda One', sans-serif;
	}

	.navbar .navbar-brand i {
		font-size: 20px;
		margin-right: 5px;
	}

	.search-box {
		position: relative;
	}

	.search-box input {
		box-shadow: none;
		padding-right: 35px;
		border-radius: 3px !important;
	}

	.search-box .input-group-addon {
		min-width: 35px;
		border: none;
		background: transparent;
		position: absolute;
		right: 0;
		z-index: 9;
		padding: 7px;
		height: 100%;
	}

	.search-box i {
		color: #a0a5b1;
		font-size: 19px;
	}

	.navbar .nav-item i {
		font-size: 18px;
	}

	.navbar .dropdown-item i {
		font-size: 16px;
		min-width: 22px;
	}

	.navbar .nav-item.open>a {
		background: none !important;
	}

	.navbar .dropdown-menu {
		border-radius: 1px;
		border-color: #e5e5e5;
		box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
	}

	.navbar .dropdown-menu a {
		color: #777;
		padding: 8px 20px;
		line-height: normal;
	}

	.navbar .dropdown-menu a:hover,
	.navbar .dropdown-menu a:active {
		color: #333;
	}

	.navbar .dropdown-item .material-icons {
		font-size: 21px;
		line-height: 16px;
		vertical-align: middle;
		margin-top: -2px;
	}

	.navbar .badge {
		color: #fff;
		background: #f44336;
		font-size: 11px;
		border-radius: 20px;
		position: absolute;
		min-width: 10px;
		padding: 4px 6px 0;
		min-height: 18px;
		top: 5px;
	}

	.navbar a.notifications,
	.navbar a.messages {
		position: relative;
		margin-right: 10px;
	}

	.navbar a.messages {
		margin-right: 20px;
	}

	.navbar a.notifications .badge {
		margin-left: -8px;
	}

	.navbar a.messages .badge {
		margin-left: -4px;
	}

	.navbar .active a,
	.navbar .active a:hover,
	.navbar .active a:focus {
		background: transparent !important;
	}

	@media (min-width: 1200px) {
		.form-inline .input-group {
			width: 300px;
			margin-left: 30px;
		}
	}

	@media (max-width: 1199px) {
		.form-inline {
			display: block;
			margin-bottom: 10px;
		}

		.input-group {
			width: 100%;
		}
	}
</style>
<nav class="navbar navbar-expand-xl sticky-top navbar-light bg-white">
	<a href="#" class="navbar-brand img-brand"><img src="image/Desain tanpa judul (15).png" class="brand" alt=""> Koper<b>Asik</b></a>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<div class="navbar-nav">
			<a href="halaman_user.php" class="nav-item nav-link active">Beranda</a>
			<div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kategori</a>
				<div class="dropdown-menu">
					<a href="#" class="dropdown-item">Web Design</a>
					<a href="#" class="dropdown-item">Web Development</a>
					<a href="#" class="dropdown-item">Graphic Design</a>
					<a href="#" class="dropdown-item">Digital Marketing</a>
				</div>
			</div>
			<a href="#tentang" class="nav-item nav-link">Tentang</a>
			<a href="produk.php" class="nav-item nav-link">Produk</a>
			<a href="#" class="nav-item nav-link">Kontak</a>
		</div>
		<form class="navbar-form form-inline ms-4 col-md-4" method="get" action="produk.php">
			<div class="bg-light rounded rounded-pill shadow-sm">
				<div class="input-group">
					<input type="text" placeholder="Search here..." aria-describedby="button-addon1" class="form-control border-0 bg-light" name="keyword">
					<div class="input-group-append">
						<button id="button-addon1" type="submit" class="btn btn-link text-black-50 me-5"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</div>
		</form>
		<div class="navbar-nav ml-auto">
			<a href="#" class="nav-item nav-link notifications"><i class="fa fa-bell-o"></i><span class="badge">1</span></a>
			<a href="#" class="nav-item nav-link messages"><i class="fa fa-envelope-o"></i><span class="badge">10</span></a></a>
			<div class="nav-item dropdown dropleft">
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><?php echo $data['nama']; ?> <b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
					<a href="#" class="dropdown-item"><i class="fa fa-calendar-o"></i> Calendar</a></a>
					<a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a></a>
					<div class="dropdown-divider"></div>
					<a href="logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></a>
				</div>
			</div>
		</div>
	</div>
</nav>