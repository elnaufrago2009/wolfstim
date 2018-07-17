<?php

	// importar header 

	include('../layouts/admin/header.php');

?>


<div class="container-fluid" id="app">
	
	<div class="row flex-xl-nowrap">

		<?php 
			
			// importar sidebar

			include('../layouts/admin/sidebar.php');

		?>


		<!-- menu derecho-->

		<?php include '../layouts/sidebar_derecho.php' ?>


		<!-- contenido del medio  -->

		<main class="col-12 col-md-9 col-xl-8 py-md-4 pl-md-5 bd-content">

			<!-- Lista de paquetes -->

			<h4 class="bd-title pb-4">Lista de Paquetes</h4>

			<div class="card-group">
			  <div class="card">
			    <img class="card-img-top" src="../assets/img/canasta-1.png" alt="Card image cap">
			    <div class="card-body">
			      <h5 class="card-title">Pack Plus <small>(200 S/.)</small></h5>
			      <p class="card-text">This is a wider card with supporting.</p>
			      <div class="btn-group aling-center" role="group" aria-label="Basic example">
						  <a href="#" class="btn btn-secondary" @click="getDetalle(1)">
						  	<i class="fa fa-plus"></i> Adquirir
						  </a>						  
						  <a href="#" class="btn btn-secondary" >Informacion</a>
						</div>
			    </div>
			  </div>
			  <div class="card">
			    <img class="card-img-top" src="../assets/img/canasta-2.jpg" alt="Card image cap">
			    <div class="card-body">
			      <h5 class="card-title">Pack Master <small>(250 S/.)</small></h5>
			      <p class="card-text">This card has supporting text below as a.</p>
			      <div class="btn-group aling-center" role="group" aria-label="Basic example">
						  <a href="#" class="btn btn-secondary" @click="getDetalle(2)">
						  	<i class="fa fa-plus"></i> Adquirir
						  </a>						  
						  <a href="#" class="btn btn-secondary">Informacion</a>
						</div>
			    </div>
			  </div>
			  <div class="card">
			    <img class="card-img-top" src="../assets/img/canasta-3.jpg" alt="Card image cap">
			    <div class="card-body">
			      <h5 class="card-title">Pack Premiun <small>(300 S/.)</small></h5>
			      <p class="card-text">This is a wider card with supporting.</p>
			      <div class="btn-group aling-center" role="group" aria-label="Basic example">
              <a
                href="#"
                class="btn btn-secondary"
                @click="getDetalle(3)"
              >
						  	<i class="fa fa-plus"></i> Adquirir
						  </a>						  
						  <a href="#" class="btn btn-secondary">Informacion</a>
						</div>
			    </div>
			  </div>
			</div>


			<!-- Modal -->
			<div class="modal fade" id="modal_add_pack" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        ...
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>


			<!-- Lista de paquetes comprados-->

			<h5 class="bd-title pt-5 pb-4">Paquetes Adquiridos</h5>
			<div class="row">
				<div class="col-12">
					<table class="table table-striped table-bordered">
						<tr>
							<th>#</th>
							<th>Descripcion</th>
							<th>Costo</th>
							<th>Detalles</th>
							<th>Fecha</th>
							<th>Estado</th>
						</tr>
						<tr>
							<td>01</td>
							<td>Canasta Pack Plus</td>
							<td>200.00 S/.</td>
							<td>Compra no regular</td>
							<td>2018-07-13</td>
							<td>Pendiente</td>
						</tr>
						<tr>
							<td>02</td>
							<td>Canasta Pack Plus</td>
							<td>200.00 S/.</td>
							<td>Compra no regular</td>
							<td>2018-07-13</td>
							<td>Activo</td>
						</tr>
						<tr>
							<td>03</td>
							<td>Canasta Pack Plus</td>
							<td>200.00 S/.</td>
							<td>Compra no regular</td>
							<td>2018-07-13</td>
							<td>Caducado</td>
						</tr>
					</table>
				</div>
			</div>
						
				
		</main>

	</div>

</div>


<?php 

	// importar footer
	include ('javascript.php');
	include('../layouts/admin/footer.php');

?>