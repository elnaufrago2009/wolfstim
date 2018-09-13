<div class="col-12 col-md-3 col-xl-2 bd-sidebar">

    <!-- formulario izquierdo -->
    <div class="bd-search text-center">
        <?php 

          if (isset($_SESSION['doc'])) {
            include '../conn.php';
            $usuario_session = $conn->query("select * from usuarios where id=".$_SESSION['userid'])->fetch_array(MYSQLI_ASSOC);
            echo '<img src="/assets/img/user_nivel'.$usuario_session['arbol_nivel'].'.png" width="60"><br>
                  <h3>'.number_format($usuario_session['acumulado'],0,'.','').'<small> S/.</small></h3>
                  <span class="font-italic">'.$_SESSION['name'].' </span> ';
            if ($_SESSION['activo']=='1') {
              echo '(Activo)';
            }else {
              echo '(Inactivo)';
            }
          }else{
            echo '<img src="/assets/img/user_nivel.png" width="80" height="80"><br>
                  <span class="font-italic">Usuario anonimo <br/>  </span><a href="/registro/">Registro</a> o 
                  </span><a href="/login/login.php">Login</a>';
          }

        ?>        

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
        <a class="bd-toc-link" href="/">Lineysoft</a>
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