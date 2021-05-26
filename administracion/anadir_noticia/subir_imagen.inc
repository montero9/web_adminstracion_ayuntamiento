	<?php

		//Datos del arhivo
			//Nombre del archivo
		$nombre_archivo = $_FILES['imagen']['name'];
			//Tipo de archivo
		$tipo_archivo = $_FILES['imagen']['type'];
			//Tamaño del archivo
		$tamano_archivo = $_FILES['imagen']['size'];
			//Carpeta donde se va a guardar
		$path="../../contenido/imagenes/noticias/".$nombre_archivo; 
			//Dirección con la ruta de la imagen en el servidor
		$direccion=$_SERVER['DOCUMENT_ROOT'].'/hinojos/contenido/imagenes/noticias/'.$nombre_archivo;
		

		$mal='';
		$bien='';
		
		//Compruebo si las características del archivo son las que deseo
		if (($tipo_archivo=='image/gif' or $tipo_archivo=='image/jpeg' or $tipo_archivo=='image/png' or $tipo_archivo=='image/jpg') and $tamano_archivo<20971520) {
		    if (move_uploaded_file($_FILES['imagen']['tmp_name'],$path)){
		       $bien="El archivo ha sido cargado correctamente.";

		    }else{
		    	//Mensaje a mostrar en caso de que no se pueda subir la imagen
		       	$mal="No se ha podido subir la imagen al servidor";
		    }
		}else{
			//Mensaje por si no cumple la imagen los requisitos
			$mal="El archivo no cumple las condiciones, ha de ser con extensi&iacute;n jpg/gif/jpeg y con tama&ntilde;o inferior a 20 Megabytes";
		}


	?>