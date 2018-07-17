<!-- Header
************************************ -->
<?php include '../layouts/header.php' ?>


<div class="container-fluid" id="app">

	
	<div class="row flex-xl-nowrap">

		
		<!-- Sidebar left 
		**************************************-->
		<?php include '../layouts/sidebar.php' ?>

		
		<!-- Sidebar Rigth
		************************************** -->
		<?php include '../layouts/sidebar_derecho.php' ?>


		<!-- Contenido Principal -->
		<main class="col-12 col-md-9 col-xl-8 py-md-4 pl-md-5 bd-content">




			<!-- Breadcum -->
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
			    <li class="breadcrumb-item"><a href="/packs/">Packs</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Data</li>
			  </ol>
			</nav>


			<!-- Titulo del detalle -->
			<div class="row">
				<div class="col-8">
					<!-- title -->
					<h2 class="bd-title pb-4">Detalle Pack Plus 2018</h2>
				</div>
				<div class="col-4 my-auto text-right">
					<a href="/packs/detalle_new.php" class="btn btn-secondary">Nuevo</a>
				</div>
			</div>

					

			<!-- tabla -->
			<div class="row">
				<div class="col-12">
					<table class="table">
						<tr class="bg-light">
							<th>#</th>
							<th>Codigo</th>
							<th>Descripcion</th>
							<th>Costo</th>
							<th>Fecha</th>
							<th>Activo</th>
							<th>Acciones</th>
						</tr>
						<tr>
							<td>01</td>
							<td>PAPLUS</td>
							<td>Canasta Pack Plus 2018</td>
							<td>200.00</td>
							<td>2018-07-15</td>
							<td>Si</td>
							<td><a href="#" class="btn btn-primary btn-sm">Detalles</a></td>
						</tr>						
					</table>
				</div>
			</div>







		</main>

	</div>


</div>


<!-- Footer 
*********************************** -->
<?php include '../layouts/footer.php'?>