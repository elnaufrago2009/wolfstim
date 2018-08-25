<div class="col-12 col-md-3 col-xl-2 bd-sidebar">

    <!-- formulario izquierdo -->
    <div class="bd-search text-center">
        <?php 

          if (isset($_SESSION['doc'])) {
            echo '<img src="/assets/img/user-4.jpg" class="rounded-circle" width="100"><br>
                  <span class="font-italic">'.$_SESSION['name'].' <br/>  </span><a href="/admin/">Admin';
            if ($_SESSION['activo']=='1') {
              echo '(Activo)</a>';  
            }else {
              echo '(Inactivo)</a>';
            }
            
          }else{
            echo '<img src="/assets/img/user_anonimo.png" class="rounded-circle" width="80" height="80"><br>
                  <span class="font-italic">Usuario anonimo? <br/>  </span><a href="/registro/">Registro</a> o 
                  </span><a href="/login/login.php">Login</a>';
          }

        ?>        
        <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3 text-right" type="button"
                data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav"
                aria-expanded="false" aria-label="Toggle docs navigation">
            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30"
                 focusable="false"><title>Menu</title>
                <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/>
            </svg>
        </button>
    </div>

    <!-- Menu Izquierdo -->
    <nav class="collapse bd-links" id="bd-docs-nav">

      <?php 
        if (isset($_SESSION['doc'])) {
      ?>
        <div class="bd-toc-item active">
          <a class="bd-toc-link" href="/admin/">Admin</a>
          <ul class="nav bd-sidenav">
            <li><a href="/admin/">Panel</a></li>
            <?php 
              if ($_SESSION['tipuser']=='2') {
                echo '<li><a href="/validar/">Validar Pagos</a></li>';
              }
            ?>
            
          </ul>
        </div>
      <?php } ?>
      
      <div class="bd-toc-item active">          
        <a class="bd-toc-link" href="/">Wolfstim</a>
          <ul class="nav bd-sidenav">
              <li><a href="/pages/politica-organizacional.php">Politica Organizacional</a></li>
              <li><a href="/pages/mision-vision.php">Mision y Vision</a></li>
              <li><a href="/pages/list_products.php">Nuestros Productos</a></li>
              <li><a href="/pages/faqs.php">Preguntas Frecuentes</a></li>
              <li><a href="/pages/centros-distribucion.php">Centros de distribucion</a></li>
              <li><a href="/pages/contactenos.php">Contactenos</a></li>
              <?php 
                if (isset($_SESSION['doc'])) {
                  echo '<li class="d-md-none"><a href="/admin/destroy_session.php">Salir</a></li>';
                } 
              ?>
              
          </ul>
      </div>      
    </nav>


</div>