<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Woltim</title>
	<!-- CSS Import -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="/assets/css/docs.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>


<!-- Cabezera Header 
----------------------------------------------->
<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">	
	<a class="navbar-brand mr-0 mr-md-2" href="/" aria-label="Bootstrap">
		<i class="fas fa-users" style="font-size: 30px;"></i>
	</a>

	<!-- Parte izquierda -->
	<div class="navbar-nav-scroll">
		<ul class="navbar-nav bd-navbar-nav flex-row">
			<li class="nav-item">
				<a class="nav-link active" href="/">WolfTim</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/">Productos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/">Mision & Vision</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/">Noticias</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/">Centros Distribucion</a>
			</li>
		</ul>
	</div>
	<?php session_start(); ?>

	<!-- Parte derecha  -->
	<ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
		<li class="nav-item">

			<!-- login o acount -->
			<?php if (isset($_SESSION['doc'])) {
				echo '					
					<a class="nav-link p-2" href="/admin/index.php">
						<i class="fa fa-lock"></i> '.$_SESSION['doc'].'
					</a>					
				';
			}else{
				echo '
					<a class="nav-link p-2" href="/login/login.php">
						<i class="fa fa-user"></i> Login
					</a>
				';
			} ?>

		</li>
	</ul>
	<?php if (isset($_SESSION['doc'])) {
		echo '<a class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="/admin/destroy_session.php">Salir</a>';
	}else{
		echo '<a class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="/admin/">Registrate</a>';
	} ?>
	
</header>



