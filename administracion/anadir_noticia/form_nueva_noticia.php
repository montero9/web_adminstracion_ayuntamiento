<?php
   //Comprobamos si la sesión está iniciada
     //CAMBIAR AL SUBIR AL SERVIDOR LA RUTA DEL REQUIRE -------------------------------------------------------------------------
     //------------------------------------------>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
     //require $_SERVER['DOCUMENT_ROOT'].'administracion/acceso/comprobador_logeo.php'; 
     require $_SERVER['DOCUMENT_ROOT'].'/hinojos/administracion/acceso/comprobador_logeo.php'; 
   
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
                  <li class="active"><a href="/hinojos/administracion/anadir_noticia/listado_noticias.php">Noticias</a></li>
                  <li><a href="/hinojos/administracion/phpmailer/listado_consultas.php">Consultas</a></li>
                  <li><a href="/hinojos/administracion/incidencias/listado_incidencias.php">Incidencias</a></li>
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
      <div class="container" style="width: 100%" >
         <div class="col-sm-8" style="width: 100%" align="center">
            <form action = "func_nueva_noticia.php" method = "post" enctype="multipart/form-data">
               <label>Fecha de la noticia: </label> <input type="date" name="fecha" value="<?php echo date("Y-m-d");?>" required/><br/><br />
               <label>Titulo: </label><br/><textarea type = "text" name = "titulo" id="titulo" required style="width: 50%"></textarea><br /><br />
               <label>Imagen <b>(jpg/jpeg/png/gif <20Mb)</b>: </label> <input type = "file" name = "imagen" required /><br/><br />
               <label>Texto de la noticia: </label><br/><textarea name="texto" id="texto" required rows="20" style="width: 70%"></textarea><br/><br />
               <input type = "submit" value = "Enviar"/><br />
            </form>
         </div>
      </div>
   </body>
</html>