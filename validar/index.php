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
        {{mensaje}}
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
              <a href="#" class="btn btn-primary btn-sm">Confirmar</a>
            </td>
          </tr>
        </table>
        <!-- end tabla de pagos -->

      </main>
    </div>
  </div>


  <script>
    var app = new Vue({
      el: '#app',
      data: {
        mensaje: 'moises',
        pedidos: {}
      },
      methods: {
        get_pagos_list: function () {
          axios.get('./get_pagos_list.php').then(response => {
            this.pedidos = response.data;
            console.log(response.data);
          })
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