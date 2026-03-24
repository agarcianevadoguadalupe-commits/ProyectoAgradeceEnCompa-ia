<?php
    session_start();
    
    require 'configdb.php';

    $usuario=$_POST['usuario'];
    $pwd=$_POST['pwd'];
    

//Primero hay que conectar
    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $conexion->set_charset("utf8"); 
        return $conexion;
    }

    $conexion=conectar();

    //Luego hay que hacer una consulta para comprobar que el usuario existe y la contraseña es correcta
    $sql = 'SELECT nOrdenador FROM alumnos
        WHERE usuario="'.$usuario.'" AND pwd="'.$pwd.'"';

    echo $sql;
    echo '<br/>';

    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_array();

        //Guarda la información del usuario en la sesión
        //Esto seguirá estando disponible en todas las páginas mientras la sesión esté activa
        $_SESSION['nOrdenador'] = $fila['nOrdenador'];
       
        //Redirige a la página de inicio después de iniciar sesión
        header('Location: inicio.php');
    }else{
        //Si el usuario no existe o la contraseña es incorrecta, muestra un mensaje de error
        echo 'Usuario o contraseña incorrectos';
    }

    
?>

<html>
    <a href="index.html" class="boton-volver">Volver</a>
</html>