<?php
	// importar header 
	include('../layouts/header.php');

	// validar Session
	include('../validar_session.php');
?>


<div class="container-fluid" id="app">
	<div class="row flex-xl-nowrap">
		<?php  include('../layouts/sidebar.php'); ?>
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
			        <h5 class="modal-title" id="exampleModalLabel" v-show="guardar">Tienes un paquete pendiente por pagar.</h5>
			        <h5 class="modal-title" id="exampleModalLabel" v-show="!guardar">Estas Seguro que quieres Adquirir?</h5>

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
			        	<span v-show="guardar">Tienes un pack pendiente por pagar. si deseas elegir otro tienes que anular este primero</span> <br>
			        	Numero de cuenta para depositar una vez pedido el pack <br>
			        	Cuenta: <strong>540-36253686-0-08</strong> <br>
			        	Nombre: <strong>Wolfstim S.A.C.</strong>
			        </p>
			      </div>
			      <div class="modal-footer">
			      	<button type="button" v-show="guardar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			        <button type="button" v-show="!guardar" @click="getOrder(packsend.id,<?php echo $_SESSION['userid'] ?>)" class="btn btn-secondary" data-dismiss="modal">Pedir</button>
			        <button type="button" v-show="!guardar" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Formulacio de envio de pago -->
			<h5 class="bd-title pt-3" v-show="formInforma">Informar Pago</h5>
			<form v-show="formInforma" v-on:submit.prevent>
				<div class="form-group row">          
	          <div class="col-sm-3">
	            <input type="text" class="form-control" placeholder="Codigo Operacion" v-model="pago.codigo">
	          </div>
	          <div class="col-sm-6">
	            <input type="text" class="form-control" placeholder="Descripcion" v-model="pago.descripcion">
	            <input type="hidden" v-model="pago.userid">
	          </div>
	          <button type="submit" class="btn btn-primary col-sm-2" v-on:click="procesa_pago(pago)">Confirmar Pago</button>
	        </div>			  
			</form>



			<!-- Lista de paquetes comprados-->
      <div class="row">
        <div class="col-12">
          <h5 class="bd-title pt-4 pb-4">Paquetes Adquiridos</h5>
        </div>

      <!-- tabla -->
      <div class="col-12">
        <table class=" table table-bordered table-responsive-md table-sm table-hover">
          <tr>
            <th>Descripcion</th>
            <th>Costo</th>
            <th>Fecha Genera</th>
            <th>Fecha informa</th>
            <th>Fecha Acepta</th>
            <th>Acciones</th>
          </tr>
          <tr v-for="(userPack,index) in user_packs">
            <td>{{userPack.descripcion}}</td>
            <td>{{userPack.costo}} S/.</td>
            <td>{{userPack.created}} </td>
            <td>{{userPack.fecha_envio_pago}} </td>
            <td></td>
            <td>
              <button class="btn btn-sm btn-secondary" v-show="userPack.estado == 0" @click="deleteOrder(userPack.id)">Eliminar</button>
            </td>
          </tr>
        </table>
      </div>
      </div>



			<!-- Arbol -->
			<div class="row">
				<h5 class="col-12 bd-title">Arbol</h5>

				<!-- Tu -->
				<div class="col-md-12 col-12 text-center" v-show="tree.tu_estado=='true'">
					{{tree.tu_nombre}} (Tu) <br>
					<img src="/assets/img/tree-user2.png" alt="" class="" width="120">
				</div>

				<!-- Hijo 01 -->
				<div class="col-12 col-md-3 text-center" v-show="tree.hijo1_estado=='true'">
					{{tree.hijo1_nombre}} (Hijo 1) <br>
					<img src="/assets/img/tree-user2.png" alt="" class="" width="120">
				</div>

				<!-- Hijo 02 -->
				<div class="col-12 col-md-3 text-center" v-show="tree.hijo2_estado=='true'">
					{{tree.hijo2_nombre}} (Hijo 2) <br>
					<img src="/assets/img/tree-user2.png" alt="" class="" width="120">
				</div>

				<!-- Hijo 03 -->
				<div class="col-12 col-md-3 text-center" v-show="tree.hijo3_estado=='true'">
					{{tree.hijo3_nombre}} (Hijo 3) <br>
					<img src="/assets/img/tree-user2.png" alt="" class="" width="120">
				</div>

				<!-- Hijo 04 -->
				<div class="col-12 col-md-3 text-center" v-show="tree.hijo4_estado=='true'">
					 {{tree.hijo4_nombre}} (Hijo 4) <br>
					<img src="/assets/img/tree-user2.png" alt="" class="" width="120" v-show="tree.hijo4_estado=='true'">
				</div>


			</div>
			<br/>
			<br/>
			<br/>
			<br/>
				
		</main>

	</div>

</div>

<script>
  var app = new Vue({
    el: '#app',
    data: {
      packs: {},
      user_packs: {},
      packsend: {},
      tree: {},
      guardar: false,
      formInforma: true,
      pago: {
        userid: '<?php echo $_SESSION['userid'] ?>',
        descripcion: 'Por favor revise mi pago'
      }
    },
    methods: {
      getDetalle: function (pack_id,user_id) {
        // obtiene el pack
        axios.get('./get_pack_pro.php?pack_id=' + pack_id + '&user_id=' + user_id).then((response) => {          
          if(response.data.guardar == 'no'){
            this.guardar = true;
          }
          this.packsend = response.data;          
          //console.log(response.data);
        });

        //activa el modal  
        $("#modal_add_pack").modal('show');
        
      },
      getPacks: function () {        
        axios.get('./pack_list_pro.php').then((response) => {
          this.packs = response.data;          
        });
      },
      getOrder: function(pack_id,user_id){
        axios.get('./get_order_pro.php?pack_id=' + pack_id + '&user_id=' + user_id).then((response)=>{
          if (response.data == 'ok') {
            window.location.href = '/admin/';
          }
          console.log(response.data);
        });
      },
      getUserOrders: function(){
        axios.get('./get_users_orders.php?user_id=<?php echo $_SESSION['userid'] ?>').then(response=>{
          this.user_packs = response.data;
          //console.log(this.user_packs);
        });
      },
      getFormSend: function(){
        axios.get('./form_informa_pro.php?userid=<?php echo $_SESSION['userid'] ?>').then(response => {
          this.formInforma = response.data;
          //console.log(response.data);
        });
      },
      procesa_pago: function(pago){
        axios.post('./form_pago_procesa.php', pago).then(response => {
          console.log(response.data);
          if (response.data == true) {
            window.location.href = "/admin/";
          }else if (response.data == false) {
          	window.location.href = "/admin/";
          }
          console.log(response.data);
        });        
      },
      get_tree: function(user_id){
      	axios.get('get_tree.php?user_id=<?php echo $_SESSION['userid'] ?>').then(response => {
      		this.tree = response.data;
      		//console.log(this.tree);
      	});
      },
      deleteOrder: function(id) {
        axios.post('delete_order.php', id).then(response => {
          if (response.data == 'ok'){
            window.location.href = '/admin/';
          }
          console.log(response.data);
        });
      }
    },    
    created: function(){
      this.getPacks();
      this.getUserOrders();
      this.getFormSend();
      this.get_tree();
    }
  })
</script>

<?php include('../layouts/footer.php'); ?>