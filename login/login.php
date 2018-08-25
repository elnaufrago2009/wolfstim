<!-- 
	Login
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

			

			<!-- title -->
			<div class="row pb-4">
				<div class="col-8"><h2 class="bd-title ">Inicio de Session</h2></div>				
			</div>
			

			<!-- Mensaje de error -->
			<div class="alert alert-danger" role="alert" v-show="error">
				Error en el correo o contraseña.
			</div>				
			
			

			<!-- Formulario del login -->
			<div class="row">
				<div class="col-md-12 col-lg-6">
					<form v-on:submit.prevent>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Email o dni</label>
					    <input type="email" v-model="login.doc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					    <small id="emailHelp" class="form-text text-muted">No compartiremos sus datos con nadie mas.</small>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Contraseña</label>
					    <input type="password" class="form-control" v-model='login.password' id="exampleInputPassword1" placeholder="Password">
					  </div>
					  <div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" id="exampleCheck1">
					    <label class="form-check-label" for="exampleCheck1">Acepto Los Terminos de Wolsftim</label>
					  </div>
					  <button type="submit" class="btn btn-primary" v-on:click="enviar(login)">Entrar</button>
					</form>
				</div>
			</div>
					

			
		</main>

	</div>


</div>

<!-- Javascript
***********************************-->
<?php include './login_js.php' ?>


<!-- Footer 
*********************************** -->
<?php include '../layouts/footer.php' ?>