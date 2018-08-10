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
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
        </table>
        <!-- end tabla de pagos -->

      </main>
    </div>
  </div>



<?php

include('./index_javascript.php');

// importar footer
include('../layouts/footer.php');

?>