<?php
   session_start();
   
   //CAMBIAR AL SUBIR AL SERVIDOR LA RUTA DEL REQUIRE -------------------------------------------------------------------------
   //------------------------------------------>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
   //header("Location: /administracion/acceso/login.php");

   if(session_destroy()) {
      header("Location: /hinojos/administracion/acceso/login.php");
   }
   
?>