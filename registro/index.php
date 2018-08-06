<?php include '../layouts/header.php' ?>
	<div class="container-fluid" id="app">
		<!--<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>-->
		<div class="row flex-xl-nowrap">
			<?php include '../views/layout/sidebar.php' ?>
			<!-- menu derecho-->
			<div class="d-none d-xl-block col-xl-2 bd-toc">
				<ul class="section-nav">
					<li class="toc-entry toc-h2">
						<a href="#quick-start">Quick start</a>
						<ul>
							<li class="toc-entry toc-h3"><a href="#css">CSS</a></li>
							<li class="toc-entry toc-h3"><a href="#js">JS</a></li>
						</ul>
					</li>
					<li class="toc-entry toc-h2"><a href="#starter-template">Starter template</a></li>
					<li class="toc-entry toc-h2">
						<a href="#important-globals">Important globals</a>
						<ul>
							<li class="toc-entry toc-h3"><a href="#html5-doctype">HTML5 doctype</a></li>
							<li class="toc-entry toc-h3"><a href="#responsive-meta-tag">Responsive meta tag</a></li>
							<li class="toc-entry toc-h3"><a href="#box-sizing">Box-sizing</a></li>
							<li class="toc-entry toc-h3"><a href="#reboot">Reboot</a></li>
						</ul>
					</li>
					<li class="toc-entry toc-h2"><a href="#community">Community</a></li>
				</ul>
			</div>
			<!-- contenedor principal-->
			<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
				<div class="text-center">
					<i class="fas fa-users fa-5x"></i>
					<h2>Registroo Wolftim</h2>
				</div>
				<p class="lead">
					Siga estos dos pasos: <br>
					1.- Llenar los campos con datos verdaderos<br>
					2.- Depositar a la cuenta
					BCP indicada abajo, Cuenta <code>540-36253686-0-08</code>.
				</p>
				<hr class="mb-4">

        <!-- formulario -->
        <h4 class="pb-4">Datos Obligatorios</h4>
        <form v-on:submit.prevent>

        <!--  DNI  -->
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">DNI</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" name="dni" v-model="registro.dni" placeholder="42516253">
          </div>
        </div>

        <!--  Correo  -->
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Email o Correo (opcional)</label>
          <div class="col-sm-5">
            <input type="email" class="form-control" name="correo" v-model="registro.correo" placeholder="corre@gmail.com">
          </div>
        </div>

        <!--  Contraseña  -->
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Contraseña</label>
          <div class="col-sm-3">
            <input type="password" class="form-control" placeholder="contraseña">
          </div>
          <div class="col-sm-3">
            <input type="password" class="form-control" name="password" v-model="registro.password" placeholder="repetir contra">
          </div>
        </div>

        <!--  Nombres  -->
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nombre y apellidos</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="nombres" v-model="registro.nombres" placeholder="Juan Perez">
          </div>
        </div>

        <!--  Celular  -->
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Celular</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" name="celular" v-model="registro.celular" placeholder="952631807">
          </div>
        </div>

        <!--  Patrocinador  -->
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">DNI Patrocinador</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" v-model="registro.dni_patrocinador" placeholder="42516258">
          </div>
        </div>

        <!--  Submit  -->
        <div class="form-group row">
          <label class="col-sm-3 col-form-label"></label>
          <div class="col-sm-2">
            <button type="submit" class="btn btn-primary form-control"  v-on:click="enviarRegistro(registro)">Registrarse</button>
          </div>
        </div>
      </form>


			</main>
		</div>
	</div>

<?php include '../assets/js/views/registro.php'?>
<?php include '../layouts/footer.php'?>