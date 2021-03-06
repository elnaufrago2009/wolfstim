<!-- 
	Lista de Paquetes
 -->



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
			    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Packs</li>
			  </ol>
			</nav>

			

			<!-- title -->
			<div class="row pb-4">
				<div class="col-8"><h2 class="bd-title ">Lista de Packs</h2></div>
				<div class="col-4 my-auto text-right">
					<a href="/packs/new.php" class="btn btn-secondary">Nuevo</a>
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
						<tr v-for="(pack,index) in packs">
							<td>{{index}}</td>
							<td>{{pack.codigo}}</td>
							<td>{{pack.descripcion}}</td>
							<td>{{pack.costo}}</td>
							<td>{{pack.created}}</td>
							<td>{{pack.activo}}</td>
							<td><a v-bind:href="'/packsdetalle/list.php?packid='+pack.id" class="btn btn-primary btn-sm">Ver Productos</a></td>
						</tr>						
					</table>
				</div>
			</div>







		</main>

	</div>


</div>

<!-- Javascript
***********************************-->
<?php include './list_js.php' ?>


<!-- Footer 
*********************************** -->
<?php include '../layouts/footer.php' ?>


