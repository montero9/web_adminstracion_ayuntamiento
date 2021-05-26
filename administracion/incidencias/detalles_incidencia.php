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

      <div class="container" style="width: 100%" >
         <div class="col-sm-8" style="width: 100%" align="center">
            <?php
               
               //Comprobamos la conexión, que hemos recibido el parametro id_detalle y ejecutamos la consulta
                  if (isset($_GET['id_detalles']) && $conexion) {
               
                     $id=$_GET['id_detalles'];
                     
                     $resultado = mysqli_query($conexion,"SELECT * FROM incidencias WHERE id='$id'");
                     
                     //Comprobamos que existe la incidencia con ese id en la tabla
                     if(mysqli_num_rows($resultado)==1){
                        $fila = mysqli_fetch_assoc($resultado);
                     }else{
                        echo "No se ha encontrado el registro en la base de datos";
                     }
                     
                  }else{
                    echo "Error al realizar la conexión a la bd";
                  }
               
            ?>
            <label>Id incidencia:</label>&nbsp;&nbsp;<input readonly type="text" size="15" name="id_incidencia" value="<?php if(isset($fila)){echo $fila['id'];} ?>"><br/><br/>
            <label>Fecha de recepción:</label>&nbsp;&nbsp;<input readonly type="text" name="fecha" value="<?php if(isset($fila)){echo $fila['fecha'];} ?>"><br/><br/>
            <label>Nombre y apellidos:</label>&nbsp;&nbsp;<input readonly size=35"  type="text" name="nombre" value="<?php if(isset($fila)){echo $fila['nombre_persona'];} ?>"><br/><br/>
            <label>Teléfono:</label>&nbsp;&nbsp;<input readonly type="text" name="telefono" value="<?php if(isset($fila)){echo $fila['telefono'];} ?>"><br/><br/>
            <label>Direccion:</label><br/>
            <Textarea readonly style="width: 45%" rows="2" name="direccion"><?php if(isset($fila)){echo $fila['direccion'];} ?></Textarea>
            <br/><br/>
            <label>Detalles:</label><br/><br/>
            <Textarea readonly rows="5" style="width: 65%" name="detalles"><?php if(isset($fila)){echo $fila['detalles'];} ?></Textarea>
            <br/><br/>
            <label>Fotografía:</label><br/><br/><a href="<?php if(isset($fila)){echo str_replace($_SERVER['DOCUMENT_ROOT'], "",$fila['foto']);} ?>"><img src="<?php if(isset($fila)){echo str_replace($_SERVER['DOCUMENT_ROOT'], "",$fila['foto']);} ?>" alt="Imagen de la incidencia"></a><br/><br/>
            <label>Estado:</label>  <?php if(isset($fila) && $fila['resuelta']==1){?> 
            <font color="#1DDD11">
               <h3>RESUELTA</h3>
            </font>
            <?php }else{ ?> 
            <font color="#F00C0F">
               <h3>PENDIENTE</h3>
            </font>
            <?php }; ?><br/><br/>
            <?php if(isset($fila) && $fila['resuelta']!=1){?> 
            <h2><a href="resolver_incidencia.php?id_incidencia=<?php echo $fila['id']?>">MARCAR COMO RESUELTA</a></h2>
            <?php } ?>
            <br/><br/>
         </div>
      </div>
   </body>
</html>