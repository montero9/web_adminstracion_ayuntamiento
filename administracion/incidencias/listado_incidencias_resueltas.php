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
         	$resultado = mysqli_query($conexion,"SELECT id, fecha, nombre_persona,resuelta FROM incidencias WHERE resuelta=1 ORDER BY resuelta, fecha DESC");
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
                  <li><a href="/hinojos/administracion/inicio.php">Inicio</a></li>
                  <li><a href="/hinojos/administracion/anadir_noticia/listado_noticias.php">Noticias</a></li>
                  <li><a href="/hinojos/administracion/phpmailer/listado_consultas.php">Consultas</a></li>
                  <li class="active"><a href="/hinojos/administracion/incidencias/listado_incidencias.php">Incidencias</a></li>
                  <li><a href="https://console.firebase.google.com/u/0/project/hinojos-b339d/notification?hl=es-419" target="_blank">Enviar notificación</a></li>
                  <li><a href="https://console.firebase.google.com/u/0/project/hinojos-b339d/analytics/app/android:app.example.usuario.proyecto/overview%3Ft=1&cs=app.m.dashboard.overview&g=1" target="_blank">Estadísticas</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> &nbsp;Conectado como <?php echo $_SESSION['usuario_sesion']; ?> </a></li>
                  <li><a href="../acceso/desconectar.php"><span class="glyphicon glyphicon-user"></span> &nbsp;Desconectar </a></li>
               </ul>
            </div>
         </div>
      </nav>

      <div class="jumbotron text-center">
         <h1>Panel de Administración</h1>
         <p>App Hinojos</p>
      </div>

      <div class="container">
         <div class="row">
            <div class="col-sm-4">
               <h3>Opciones</h3>
               <ul class="nav nav-pills nav-stacked">
                  <li><a href="listado_incidencias.php">Incidencias pendientes</a></li>
               </ul>
            </div>
            <div class="col-sm-8">
               <table border="1" width="100%">
                  <caption>
                     <h2>Incidencias resueltas</h2>
                  </caption>
                  <t>
                  <th>Id</th>
                  <th>Fecha</th>
                  <th>Nombre y apellidos</th>
                  <th>Ver detalles</th>
                  <th>Estado</th>
                  </tr>
                  <?php
                     while($fila = mysqli_fetch_assoc($resultado)){
                  ?>
                        <tr>
                           <td><?php echo $fila['id'] ?></td>
                           <td><?php echo $fila['fecha'] ?></td>
                           <td><?php echo $fila['nombre_persona'] ?></td>
                           <td><a href="detalles_incidencia.php?id_detalles=<?php echo $fila['id']; ?>">Ver detalles</a></td>
                           <td><?php  if($fila['resuelta']==1){ ?><img src="contenido/contestada.png"/> <?php }else{ ?> <img src="contenido/no_contestada.png"/> <?php } ?></td>
                        </tr>
                  <?php
                     }
                  ?>
               </table>
            </div>
         </div>
      </div>
   </body>
</html>