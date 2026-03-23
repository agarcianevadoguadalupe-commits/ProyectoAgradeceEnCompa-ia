<?php
  //Necesitar hacer include o require del archivo que tiene la conexión
  function conectar(){
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); 
    return $conexion;
  }
  
  //Función para mostrar filas de una tabla
  function mostrar_alumnos(){ 
	//Conecta con la base de datos y crea el objeto $conexión.
	$conexion=conectar();  
	
	//Ejecuta la consulta sql
	$sql='select idAlumno, nombre from alumnos';
	$resultado=$conexion->query($sql);
	
	//Extrae cada una fila del resultado de la consulta
	while($fila=$resultado->fetch_array()){
	//Ejemplo que muestra un campo   
		echo '<p>';
	   	echo 'ID alumno: '.$fila["idAlumno"];
	  	echo 'Nombre alumno: '.$fila["nombre"]; 
	  	echo '</p>';
	}
	
 
 ?>
  