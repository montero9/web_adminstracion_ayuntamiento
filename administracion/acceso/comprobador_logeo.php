<?php
   session_start();
   
   require $_SERVER['DOCUMENT_ROOT'].'/hinojos/includes/conexion.inc'; 
   
   //Almaceno, si extiste, el usuario que inicio la session, de la variable de sesion que creamos en el login
      if (isset($_SESSION['usuario_sesion'])) {
         $usuario_iniciado = $_SESSION['usuario_sesion'];

         //Creo la consulta y la ejecuto
         $valor_obtenido = mysqli_query($conexion,"select user from usuarios where user = '$usuario_iniciado' ");

         //Busco si está el usuario en la bd
         $fila = mysqli_fetch_array($valor_obtenido,MYSQLI_ASSOC);
         
         //Obtengo el número de filas afectadas
         $usuarioTotales=mysqli_num_rows($valor_obtenido);

         //Compruebo que usuario está en la base de datos
         if($usuarioTotales != 1){
            header("location: /hinojos/administracion/acceso/login.php");
         }
      }
   


   //Si no está el usuario logeado lo mando de nuevo al login
   if(!isset($_SESSION['usuario_sesion'])){
      header("location: /hinojos/administracion/acceso/login.php");
   }
   
?>