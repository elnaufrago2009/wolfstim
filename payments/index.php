<?php include '../layouts/header.php' ?>
<div class="container-fluid" id="app">
  <div class="row">
    <?php include '../layouts/sidebar.php' ?>
    <?php include '../layouts/sidebar_derecho.php' ?>
    <main class="col-12 col-md-9 col-xl-8 py-md-4 pl-md-5 bd-content">
      <h1 class="display-4">Lista de Pagos</h1>
      <table class="table table-sm table-hover">
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Nivel</th>
          <th>Acciones</th>
        </tr>
        <tr v-for="(payment,index) in payments">
          <td>{{payment.id}}</td>
          <td>{{payment.nombre}}</td>
          <td>{{payment.acumulado}}</td>
          <td>{{payment.arbol_nivel}}</td>
          <td class="text-center">
            <button class="btn btn-sm btn-primary" @click="get_modal(payment)">Pagar</button>
          </td>
        </tr>
      </table>

      <!-- Modal -->
      <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"><h4>Confirmar Pago S/. {{payment.acumulado}}</h4></div>
            <div class="modal-body">
              <strong>Nombre : </strong> {{payment.nombre}} <br>
              <strong>Cantidad : </strong> {{payment.acumulado}} soles<br>
              <strong>Nivel : </strong> {{payment.arbol_nivel}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" @click="save_payment(payment.id)" data-dismiss="modal">Pagar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<script>
  var app = new Vue({
    el: "#app",
    data: {
      message: 'moises',
      payments: {},
      payment: {}
    },
    methods: {
      get_payments: function () {
        axios.get('./payments_list.php').then(response => {
          this.payments = response.data;
        })
      },
      get_modal: function(payment){
        this.payment = payment;
        $("#payment").modal('show');

      },
      save_payment: function (user_id) {
        axios.get('./payment.php?user_id=' + user_id).then( response => {
          //console.log(response.data);
          this.payments = response.data;
        });
      }
    },
    created: function () {
      this.get_payments();
    }
  });
</script>
<?php include '../layouts/footer.php' ?>

