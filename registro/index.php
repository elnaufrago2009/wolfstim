<?php include '../layouts/header.php' ?>
	<div class="container-fluid" id="app">
		<!--<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>-->
		<div class="row flex-xl-nowrap">
			<?php include '../layouts/sidebar.php' ?>
			<!-- menu derecho-->
      <?php include '../layouts/sidebar_derecho.php' ?>			
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
					BCP indicada abajo, <code>Cuenta 540-36253686-0-08</code>. <br>
          <code>Nombre: Abraham Moises Linares Oscco</code>
				</p>
				<hr class="mb-4">

        <!-- formulario -->
        <h4 class="pb-4">Datos Obligatorios</h4>

        <!-- Mensaje de errores -->
        <div class="alert alert-danger" role="alert" v-show="error">
          {{message}}
        </div>
        <form v-on:submit.prevent>

          <!--  Nombres  -->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nombre y apellidos</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="nombres" v-model="registro.nombres" placeholder="Juan Perez">
            </div>
          </div>

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
              <input type="password" class="form-control" placeholder="contraseña" v-model="registro.password">
            </div>
            <div class="col-sm-3">
              <input type="password" class="form-control" name="password" v-model="registro.rpassword" placeholder="repetir contra">
            </div>
          </div>

          

          <!--  Celular  -->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Celular</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="celular" v-model="registro.celular" placeholder="952631807">
            </div>
          </div>

          <!--  Padre  -->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">DNI Padre</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" v-model="registro.dni_padre" placeholder="42516258">
            </div>
          </div>

          <!--  Patrocinador  -->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">DNI Patrocinador</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" v-model="registro.arbol_patrocinador" placeholder="47895219">
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

<script>
  var app = new Vue({
    el: '#app',
    data: {      
      registro: {},
      error: false,
      message: ''
    },
    methods: {
      enviarRegistro: function (registro) {
        axios.post('/registro/procesa_registro.php', registro).then((response) => {
          if (response.data.estado == 'ok'){
            window.location.href = "/admin/";
          }else {
            this.error = true;
            this.message = response.data.mensaje;
          }
          console.log(response.data);
          //window.location.href = "/";
        })

      }
    }
  })
</script>
<?php include '../layouts/footer.php'?>