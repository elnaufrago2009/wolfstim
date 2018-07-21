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
			    <li class="breadcrumb-item"><a href="/packs/">Packs Plus</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Nuevo detalle Pack</li>
			  </ol>
			</nav>



			<!-- Titulo -->
			<h3 class="bd-title pb-4">Nuevo Producto</h3>




			<!-- Formulario
			**************************************-->
			<form v-on:submit.prevent>




        <!-- Descripcion -->
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Descripcion</label>
          <div class="col-sm-6">
            <input 
            	type="text" 
            	class="form-control"             	
            	v-model="pack_detalle.descripcion" 
            	placeholder="Leche grande 600ML sin grasa">
          </div>
        </div>





        <!-- Cantidad -->
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Cantidad</label>
          <div class="col-sm-2">
            <input 
            	type="number" 
            	class="form-control"             	
            	v-model="pack_detalle.cantidad" 
            	placeholder="5">
          </div>
        </div>




        <!-- precio -->
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Precio</label>
          <div class="col-sm-2">
            <input 
            	type="number"
            	class="form-control"             	
            	v-model="pack_detalle.precio" 
            	placeholder="15.56">
          </div>
        </div>



        <!-- Activo -->
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Activo</label>
          <div class="col-sm-3">
          	<select class="form-control" v-model="pack_detalle.activo">
				      <option value="1">Activo</option>
				      <option value="0">No Activo</option>				      
				    </select>            
          </div>
        </div>



        <!-- Imagen -->
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Imagen</label>
          <div class="col-sm-7">
            <input 
            	type="text"
            	class="form-control"             	
            	v-model="pack_detalle.imagen" 
            	placeholder="imagen.jpg">
          </div>
        </div>



        <!-- Sumbit -->        
        <div class="form-group row">
          <label class="col-sm-2 col-form-label"></label>
          <div class="col-sm-2">
            <button 
            	type="submit" 
            	class="btn btn-primary form-control"  
            	v-on:click="enviar(pack_detalle)">
            	Crear Pack
          	</button>
          </div>
        </div>




			</form>



		</main>

	</div>


</div>


<!-- Footer 
*********************************** -->
<?php include '../layouts/footer.php'?>



