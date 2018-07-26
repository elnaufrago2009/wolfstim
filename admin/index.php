<?php

	// importar header 
	include('../layouts/header.php');


	// validar Session
	include('../validar_session.php');

?>


<div class="container-fluid" id="app">
	
	<div class="row flex-xl-nowrap">

		<?php 
			
			// importar sidebar

			include('../layouts/sidebar.php');

		?>


		<!-- menu derecho-->

		<?php include '../layouts/sidebar_derecho.php' ?>


		<!-- contenido del medio  -->

		<main class="col-12 col-md-9 col-xl-8 py-md-4 pl-md-5 bd-content">

			<!-- Lista de paquetes -->

			<h4 class="bd-title pb-4">Lista de Paquetes</h4>


			<div class="card-group">
			  <div class="card" v-for="(pack,index) in packs">
			    <img class="card-img-top" :src="'../assets/img/' + pack.image" alt="Card image cap">
			    <div class="card-body">
			      <h5 class="card-title">{{pack.descripcion}} <small>({{pack.costo}} S/.)</small></h5>			      
			      <div class="btn-group aling-center" role="group" aria-label="Basic example">
			      	<!-- Adquirir paquete -->
			      	<button type="button" @click="getDetalle(pack.id,<?php echo $_SESSION['userid'] ?>)" class="btn btn-secondary"> <i class="fa fa-plus"></i> Pedir</button>						  			  
			      	<!-- informacion -->
						  <a href="#" class="btn btn-secondary" >Informacion</a>
						</div>
			    </div>
			  </div>			  
			</div>


			<!-- Modal -->
			<div class="modal fade" id="modal_add_pack" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel" v-show="previous">Tienes un paquete pendiente por pagar.</h5>
			        <h5 class="modal-title" id="exampleModalLabel" v-show="!previous">Estas Seguro que quieres Adquirir?</h5>

			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <h2>{{packsend.descripcion}} <small>S./ {{packsend.costo}}</small> </h2>
			        <p v-if="packsend.image">
			        	<img class="card-img-top" v-bind:src="'../assets/img/'+packsend.image" height="200" >
			        </p>
			        <p>
			        	<span v-show="previous">Tienes un pack pendiente por pagar. si deseas elegir otro tienes que anular este primero</span> <br>
			        	Numero de cuenta para depositar una vez pedido el pack <br>
			        	Cuenta: <strong>540-36253686-0-08</strong> <br>
			        	Nombre: <strong>Wolfstim S.A.C.</strong>
			        </p>
			      </div>
			      <div class="modal-footer">
			      	<button type="button" v-show="previous" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			        <button type="button" v-show="!previous" @click="getOrder(packsend.id,<?php echo $_SESSION['userid'] ?>)" class="btn btn-secondary" data-dismiss="modal">Pedir</button>
			        <button type="button" v-show="!previous" class="btn btn-primary">Save changes</button>

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
	include('../layouts/footer.php');

?>