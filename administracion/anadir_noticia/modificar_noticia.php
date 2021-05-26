<?php
   //Comprobamos si la sesión está iniciada
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
            <?php
               //Obtenemos el archivo que se encarga de subir la imagen
               require_once ('subir_imagen.inc'); 
               
                  //Comprobamos que la conexion ha sido correcta
               if(!$conexion){
                   echo "Ha habido un error al conectarse a la Base de datos";

               }elseif ($mal!='') {

                  //Comprobamos que el servidor ha podido subir la imagen correctamente
                  echo "$mal";
               }else{

                   //Recogemos los valores del formulario, en referencia a los campos modificables
                  $idnoticia_re=$_POST['idnoticia'];
                  $titulo_re = $_POST['titulo'];
                  $texto_re = $_POST['texto'];
               
                   //Creamos la consulta y la ejecutamos
                  $query="UPDATE noticias SET titulo='$titulo_re', texto='$texto_re' WHERE id='$idnoticia_re'";
                  $resultado=mysqli_query($conexion,$query);
               
                     //Comprobamos si se ha insertado o no 
                  if($resultado){
                     echo '<img src="../imagenes/correcto.jpg" /><br/>';
                     echo "<h3>La noticia ha sido actualizada correctamente</h3>";
                  }else{
                     echo '<img src="../imagenes/error.jpg" /><br/>';
                     echo "<h3>No se ha podido actualizar la noticia ".mysqli_error($conexion).'</h3>';
                  }
               }
               
            ?>
         </div>
      </div>
   </body>
</html>