<?php

// importar header
include('../layouts/header.php');

// validar Session
include('../validar_session.php');

?>


  <div class="container-fluid" id="app">
    <div class="row flex-xl-nowrap">
      <?php include('../layouts/sidebar.php'); ?>
      <!-- menu derecho-->
      <?php include '../layouts/sidebar_derecho.php' ?>
      <!-- contenido del medio  -->
      <main class="col-12 col-md-9 col-xl-8 py-md-4 pl-md-5 bd-content">
        <h1>Lista de pagos para verificar</h1>

        <!-- tabla de pagos -->
        <table class="table table-sm table-striped">
          <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Pack</th>
            <th>Operacion</th>
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
          <tr v-for="(pedido,index) in pedidos">
            <td>{{index}}</td>
            <td>{{pedido.nombre}}</td>
            <td>{{pedido.descripcion}}</td>
            <td>{{pedido.pago_operacion}}</td>
            <td>{{pedido.created}}</td>
            <td>
              <button 
								type="button" 
								class="btn btn-primary btn-sm" 
								@click="get_modal(pedido.id)">Confirmar
							</button>
            </td>
          </tr>
        </table>
        <!-- end tabla de pagos -->

        <!-- Modal -->
        <div class="modal fade" id="modal_pago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <h3>Esta seguro que el pago ha sido verificado? </h3>                 
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button 
                  type="button" 
                  @click="verificar_pago(pedidoid)"  
                  class="btn btn-secondary" 
                  data-dismiss="modal">Verificar Pago
                 </button>
              </div>
            </div>
          </div>
        </div>


      </main>
    </div>

  </div>


  


  <script>
    var app = new Vue({
      el: '#app',
      data: {
        mensaje: 'moises',
        pedidos: {},
        pedidoid: 'a'        
      },
      methods: {
        get_pagos_list: function () {
          axios.get('./get_pagos_list.php').then(response => {
            this.pedidos = response.data;            
          });
        },
        get_modal: function(pedido){
          this.pedidoid = pedido;
          $("#modal_pago").modal('show');          
        },
        verificar_pago: function(pedido){
          axios.get('./confirmar_pago.php?pedido_id=' + pedido).then(response => {
            if (response.data == 'ok') {
              window.location.href = "/validar/";
            }
            //console.log(response.data);
          });
	       
        }
      },
      created: function(){
        this.get_pagos_list()
      }
      
    });
  </script>


<?php

// importar footer
include('../layouts/footer.php');

?>
