<?php

    session_start();
    require 'configdb.php';

    function conectar(){
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $conexion->set_charset("utf8"); 
        return $conexion;
    }

    function mostrar_alumnos(){ 
        $conexion=conectar();  
        $sql='select nOrdenador, nombre from alumnos';
        $resultado=$conexion->query($sql);

        //Extrae cada una fila del resultado de la consulta
        while($fila=$resultado->fetch_array()){
        //Ejemplo que muestra un campo   
            echo '<option value="'.$fila["nOrdenador"].'">'.$fila["nombre"].' - '.$fila["nOrdenador"].'</option>';
        }
        
        return $resultado;
    }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agradece en Compañía</title>
    <meta name="author" content="Abraham García Nevado">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <style>
        textarea {
            resize: none !important;
        }
    </style>
</head>

<body>

    <nav>

        <div class="logo">
            <a href="inicio.html">Agradecer en Compañía</a>
        </div>

        <div class="menu">
            <a href="#">Agradecer</a>
            <a href="recibir.html">Recibir</a>
            <a href="index.html">Cerrar Sesión</a>
        </div>

    </nav>


    <h1>AGRADECE EN COMPAÑÍA</h1>

    <h2>Enviar Agradecimiento</h2>

    <?php
        // Recoge los datos enviados por POST
        $para = $_POST['para'] ?? '';      // Si no viene, será cadena vacía
        $mensaje = $_POST['mensaje'] ?? '';
    ?>
        <div class="resultado">
    <?php
        $nOrdenador = $_SESSION['nOrdenador'] ?? 'Desconocido';
        echo "<p><strong>De:</strong> $nOrdenador</p>";
        echo "<p><strong>Para:</strong> $para</p>";
        echo "<p><strong>Mensaje:</strong><br>$mensaje</p>";
    ?>
    
    <a href="agradecer.php" class="boton-volver">Volver</a>
</div>

</body>
</html>