<?php
   //Solicitamos los archivo de conexion
   require_once("../../includes/conexion.inc");
   //Creamos una session
   session_start();

   //Variable que almecna el mensaje de usuario y contraseña incorrecta
   $error="";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
     
     //Recogemos los valores de usuario y contraseña introducidos en el formulario 
      $usuario_introducido = mysqli_real_escape_string($conexion,$_POST['usuario']);
      $pass_introducido = mysqli_real_escape_string($conexion,$_POST['contrasena']); 
      
      //Creamos la consulta y la ejecutamos
      $consulta = "SELECT id FROM usuarios WHERE user = '$usuario_introducido' and password = sha2('$pass_introducido',256)";
      $resultado = mysqli_query($conexion,$consulta);
      $row = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      //Almacenamos en filas si la consulta devolvio una fila
      $filas = mysqli_num_rows($resultado);
      
      //Si devolvió una fila, es que el usuario  con esa contraseña existe en la bd    
      if($filas == 1) {
         //Creo una variable de session para guardar el login y 
         //poder comprobar posteriormente si el usuario está logeado en cada página
         $_SESSION['usuario_sesion'] = $usuario_introducido;           

         header("location: ../inicio.php");
      }else {
         $error = "Usuario o contraseña son incorrectos";
      }
   }
?>
