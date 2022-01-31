<?php
  require_once('./../../../Config/config.php');
  session_start();
  $validacionSession =  $_SESSION["name"] ? $_SESSION["name"] : 'No se inicio, o ocurrio un error';  
  $idUsuario = $_SESSION["id"];
  //include_once('./../menu.php');
  $nameArchivo = basename( __FILE__ );
  $parte = explode(".", $nameArchivo);
  $nameMenu = ucfirst($parte[0]);
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo $nameMenu .' | '. NOMBRE_SISTEMA ?></title>
    <script>
        var data = '';
        var nombreUsuario = '<?= $validacionSession;?>';
        var id_Usuario = '<?= $idUsuario;?>';  
    </script>
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name"><?php echo NOMBRE_SISTEMA?></span>
    </div>
    <ul id="contendor" class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Inicio</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Category</a></li>
        </ul>
      </li>
      <template id="template-modulo">
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class='bx bx-collection' ></i>
              <span class="link_name">Category</span>
            </a>
            <i class='bx bxs-chevron-down arrow' ></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Category</a></li>
            <li><a href="#">HTML & CSS</a></li>
            <li><a href="#">JavaScript</a></li>
            <li><a href="#">PHP & MySQL</a></li>
          </ul>
        </li>
      </template>
      <li>
        <div class="profile-details">
          <div class="profile-content">
            <img src="image/profile.jpg" alt="profileImg">
          </div>
          <div class="name-job">
            <div class="profile_name">Prem Shahi</div>
            <div class="job">Web Desginer</div>
          </div>
          <i class='bx bx-log-out' ></i>
        </div>
      </li>
    </ul>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Drop Down Sidebar</span>
    </div>
  </section>

  <script src="script.js"></script>

</body>
</html>
