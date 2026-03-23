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
    $sql = 'SELECT usuario FROM alumnos
        WHERE usuario="'.$usuario.'" AND pwd="'.$pwd.'"';

    echo $sql;
    echo '<br/>';

    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_array();

        //Guarda la información del usuario en la sesión
        //Esto seguirá estando disponible en todas las páginas mientras la sesión esté activa
        $_SESSION['usuario'] = $fila['usuario'];
    }

    //Redirige a la página de inicio después de iniciar sesión
    header('Location: inicio.html');
?>