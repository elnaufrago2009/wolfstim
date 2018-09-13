<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Wolfstim</title>
	<!-- CSS Import -->
	<link href="/assets/css/bootstrap.css" rel="stylesheet">
	<link href="/assets/css/docs.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>


<!-- Cabezera Header 
----------------------------------------------->
<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
  <?php
    if (isset($_SESSION['doc'])){
      $href_logo = '/admin/';
    }else {
      $href_logo = '/';
    }
  ?>
	<a class="navbar-brand mr-0 mr-md-2 pt-0" href="<?php echo $href_logo ?>" aria-label="Bootstrap">
    Lineysoft
	</a>

	<!-- Parte izquierda -->
	<div class="navbar-nav-scroll">
		<ul class="navbar-nav bd-navbar-nav flex-row">
      <?php if ($_SERVER['PHP_SELF'] != '/index.php'){ ?>
        <li class="nav-item d-md-none">
          <span class="nav-link" data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs navigation">Menu</span>
        </li>
      <?php } ?>
      <?php if (isset($_SESSION['doc'])) { ?>
      <li class="nav-item d-md-none">
        <a class="nav-link" href="/admin/">Admin</a>
      </li>
      <?php } else { ?>
      <li class="nav-item d-md-none">
        <a class="nav-link" href="/pages/faqs.php">Registro</a>
      </li>
      <li class="nav-item d-md-none">
        <a class="nav-link" href="/login/login.php">Login</a>
      </li>
      <?php } ?>

			<li class="nav-item">
				<a class="nav-link" href="/pages/faqs.php">Preguntas Frecuentes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/pages/mision-vision.php">Mision y Vision</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/pages/centros-distribucion.php">Centros Distribucion</a>
			</li>
		</ul>
	</div>


	<!-- Parte derecha  -->
	<ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
		<li class="nav-item">

			<!-- login o acount -->
			<?php if (isset($_SESSION['doc'])) {
				echo '					
					<a class="nav-link p-2" href="/admin/index.php">
						<i class="fa fa-lock"></i> '.$_SESSION['doc'];
						if ($_SESSION['activo']=='1') {
              echo ' (Activo)</a>';
            }else {
              echo ' (Inactivo)</a>';
            }
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
		echo '<a class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="/registro/">Registrate</a>';
	} ?>

</header>
