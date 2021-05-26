<?php
   //Comprobamos si el usuario esta logeado
   require $_SERVER['DOCUMENT_ROOT'].'/hinojos/administracion/acceso/comprobador_logeo.php'; 
   
   //Conectamos con la bd
   require $_SERVER['DOCUMENT_ROOT'].'/hinojos/includes/conexion.inc'; 
?>

<!DOCTYPE html>
<html lang="es">
   <head>
      <title>Panel de administración App Hinojos</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="/hinojos/administracion/css/lista_noticias.css">
   </head>
   <body>
      <?php
         //Comprobamos la conexión y ejecutamos la consulta
         if ($conexion) {
               $consultas_pendientes = mysqli_query($conexion,"SELECT id FROM consultas WHERE resuelta = 0");
               $incidencias_pendientes = mysqli_query($conexion,"SELECT id FROM incidencias WHERE resuelta = 0");
               $noticias_activas = mysqli_query($conexion,"SELECT id FROM noticias");
         }
      ?>

      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="/hinojos/administracion/inicio.php">App Hinojos</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="/hinojos/administracion/inicio.php">Inicio</a></li>
                  <li><a href="/hinojos/administracion/anadir_noticia/listado_noticias.php">Noticias</a></li>
                  <li><a href="/hinojos/administracion/phpmailer/listado_consultas.php">Consultas</a></li>
                  <li><a href="/hinojos/administracion/incidencias/listado_incidencias.php">Incidencias</a></li>
                  <li><a href="https://console.firebase.google.com/u/0/project/hinojos-b339d/notification?hl=es-419" target="_blank">Enviar notificación</a></li>
                  <li><a href="https://console.firebase.google.com/u/0/project/hinojos-b339d/analytics/app/android:app.example.usuario.proyecto/overview%3Ft=1&cs=app.m.dashboard.overview&g=1" target="_blank">Estadísticas</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> &nbsp;Conectado como <?php echo $_SESSION['usuario_sesion']; ?> </a></li>
                  <li><a href="acceso/desconectar.php"><span class="glyphicon glyphicon-user"></span> &nbsp;Desconectar </a></li>
               </ul>
            </div>
         </div>
      </nav>

      <div class="jumbotron text-center">
         <h1>Panel de Administración</h1>
         <p>App Hinojos</p>
      </div>

      <div class="container" align="center">
         <div class="col-sm-4 visible-sm visible-lg">
            <h3>Prección meteorológica</h3>
            <div id="tiempo_0637745a47f930081a98c9caf3391a23">
               <div></div>
               <div id="c_b38fb2fc13db067f42d74d4f6be10008" class="normal"></div>
               <script type="text/javascript" src="https://www.eltiempo.es/widget/widget_loader/b38fb2fc13db067f42d74d4f6be10008"></script>
            </div>
         </div>
         <div class="col-sm-8" align="center">
            <h1 style="color: #086DAF">Consultas pendientes: </h1>
            <h2 style="color: #FB0515"><?php  echo mysqli_num_rows($consultas_pendientes) ; ?> </h2>
            <h1 style="color: #086DAF">Incidencias pendientes:</h1>
            <h2 style="color: #FB0515"> <?php  echo mysqli_num_rows($incidencias_pendientes) ; ?> </h2>
            <h1 style="color: #086DAF">Noticias activas:</h1>
            <h2 style="color: #FB0515"> <?php  echo mysqli_num_rows($noticias_activas) ; ?> </h2>
         </div>
      </div>
   </body>
</html>