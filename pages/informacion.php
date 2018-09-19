<?php include '../layouts/header.php' ?>
<div class="container-fluid" id="app">
  <div class="row flex-xl-nowrap">

    <!-- Sidebar -->
    <?php include '../layouts/sidebar.php' ?>
    <?php include '../layouts/sidebar_derecho.php' ?>

    <!-- Contenido Principal -->
    <main class="col-12 col-md-9 col-xl-8 py-4 pl-md-5 bd-content">


      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Informacion</li>
        </ol>
      </nav>



      <h1 class="bd-title">Plan de compenzacion</h1>
      <p class="bd-lead">
        Por cada persona nueva que tu logres afiliar en el mes, la compañía
        te bonifica con S/ 10.00 nuevos soles adicionales.
      </p>
      <div class="bd-example">
        <table class="table table-responsive-md table-bordered">
          <tbody>
          <tr>
            <td colspan="6" class="text-center"><strong>YO</strong></td>
            <td>BONO MENSUAL</td>
            <td>BONO ACUMULADO</td>
          </tr>
          <tr>
            <th scope="row">4%</th>
            <td>Nivel 1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>S/. 36.00</td>
            <td>S/. 36.00</td>
          </tr>
          <tr class="table-primary">
            <th scope="row">4%</th>
            <td>Nivel 2</td>
            <td>4</td>
            <td>4</td>
            <td>4</td>
            <td>4</td>
            <td>S/. 144.00</td>
            <td>S/. 180.00</td>
          </tr>
          <tr class="table-secondary">
            <th scope="row">5%</th>
            <td>Nivel 3</td>
            <td>16</td>
            <td>16</td>
            <td>16</td>
            <td>16</td>
            <td>S/. 640.00</td>
            <td>S/. 820.00</td>
          </tr>
          <tr class="table-success">
            <th scope="row">3.5%</th>
            <td>Nivel 4</td>
            <td>64</td>
            <td>64</td>
            <td>64</td>
            <td>64</td>
            <td>S/. 1792.00</td>
            <td>S/. 2,612.00</td>
          </tr>
          <tr class="table-danger">
            <th scope="row">1.5%</th>
            <td>Nivel 5</td>
            <td>256</td>
            <td>256</td>
            <td>256</td>
            <td>256</td>
            <td>S/. 3,072.00</td>
            <td>S/. 5,584.00</td>
          </tr>
          <tr class="table-warning">
            <th scope="row">1%</th>
            <td>Nivel 6</td>
            <td>1024</td>
            <td>1024</td>
            <td>1024</td>
            <td>1024</td>
            <td>S/. 8,192.00</td>
            <td>S/. 13,876.00</td>
          </tr>
          <tr class="table-info">
            <th scope="row">1%</th>
            <td>Nivel 7</td>
            <td>4096</td>
            <td>4096</td>
            <td>4096</td>
            <td>4096</td>
            <td>S/. 32,768.00</td>
            <td rowspan="2"><strong>S/. 46,644.00</strong></td>
          </tr>
          <tr>
            <td colspan="7" class="text-center"><strong>TOTAL A GANAR MENSUAL</strong></td>
          </tr>

          </tbody>
        </table>
      </div>

      <div class="bd-example">
        <div class="row">
          <div class="col-12 text-center">
            <img src="../assets/img/arbol_lineysoft.jpg" class="img-fluid" alt="" >
          </div>
        </div>
      </div>

    </main>

  </div>
</div>
<?php include '../layouts/footer.php' ?>