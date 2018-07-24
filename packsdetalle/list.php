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
			    <li class="breadcrumb-item"><a href="/packs/list.php">Packs</a></li>
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
					<a href="/packsdetalle/new.php?packid=<?php echo $_GET['packid']?>" class="btn btn-primary">Nuevo</a>
				</div>
			</div>

			

			<!-- tabla -->
			<div class="row">
				<div class="col-12">
					<table class="table">
						<tr class="bg-light">
							<th>#</th>							
							<th>Descripcion</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Fecha</th>
							<th>Activo</th>
							<th>Acciones</th>
						</tr>
						<tr v-for="(detalle,index) in packsdetalles">
							<td>{{index}}</td>
							<td>{{detalle.descripcion}}</td>
							<td>{{detalle.cantidad}}</td>
							<td>{{detalle.precio}}</td>
							<td>{{detalle.updated}}</td>
							<td>{{detalle.activo}}</td>
							<td><a href="#" class="btn btn-secondary btn-sm">Editar</a></td>
						</tr>						
					</table>
				</div>
			</div>



		</main>

	</div>


</div>



<!-- Javascript
------------------------------------>
<?php include './list_js.php' ?>



<!-- Footer 
*********************************** -->
<?php include '../layouts/footer.php'?>