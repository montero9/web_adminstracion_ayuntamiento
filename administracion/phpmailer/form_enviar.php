<?php

   //Comprobamos si el usuario esta logeado
   require $_SERVER['DOCUMENT_ROOT'].'/hinojos/administracion/acceso/comprobador_logeo.php'; 
   
   //Conectamos con la bd
   require $_SERVER['DOCUMENT_ROOT'].'/hinojos/includes/conexion.inc'; 
   
   //Comprobamos que nos llega un id
   if(isset($_GET['idconsulta'])){
       $id_consulta = $_GET['idconsulta'];
      
       //Comprobamos la conexión
       if ($conexion) {
      
            $resultado = mysqli_query($conexion,"SELECT * FROM consultas WHERE id='$id_consulta'");
         
            //Comprobamos que existe la consulta con ese id en la tabla
            if(mysqli_num_rows($resultado)==1){
              $fila = mysqli_fetch_assoc($resultado);
            }else{
              echo "No se ha encontrado el registro en la base de datos";
            }
         
       }else{
         echo "Error al realizar la conexión a la bd";
       }
   }
   
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
                  <li><a href="/hinojos/administracion/anadir_noticia/listado_noticias.php">Noticias</a></li>
                  <li  class="active"><a href="/hinojos/administracion/phpmailer/listado_consultas.php">Consultas</a></li>
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
            <form action="enviar.php" method="post" accept-charset="utf-8">
               <label>Identificador de la consulta </label><br><input type="text" name="idconsulta" size="15" readonly value="<?php echo $fila['id'] ?>" ><br><br/>
               <label>Titulo de Email: </label>&nbsp;&nbsp;<input type="text" name="titulo" size="35" required value="Respuesta a su consulta (Ayto. Hinojos)"><br><br/>
               <label>Autor: </label>&nbsp;&nbsp;<input type="text" name="destinatario" size="35" readonly value="<?php echo $fila['nombre'] ?>"><br><br/>
               <label>Destinatario </label>&nbsp;&nbsp;<input type="text" name="email_destinatario" size="35" readonly value="<?php echo $fila['email'] ?>" ><br><br/>
               <label>Consulta </label><br/><textarea readonly style="width: 70%" rows="5" name="consulta"><?php echo $fila['comentario'] ?></textarea><br><br/>
               <label>Respuesta: </label><br><textarea name="respuesta" style="width: 70%" rows="5" required=""></textarea><br><br/>
               <input type="submit" name="enviar" value="Enviar">
            </form>
         </div>
         
      </div>
   </body>
</html>