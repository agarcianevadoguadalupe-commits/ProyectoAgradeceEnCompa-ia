<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agradece en Compañía</title>
    <meta name="author" content="Abraham García Nevado">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
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

    <form action="enviar.php" method="post">

        <label for="para">Para:</label><br>

        // Me he ayudado de la IA para sacar esta solución pero lo he leído y intentado entender como podía
        // porque no tengo ni idea de PHP.
      
        <select id="para" name="para" required> // Elegí el nombre de "para" para la variable ya que es PARA quien va el mensaje.
            <?php
            // Recogemos los id y nombres de nuestros compañeros de la base de datos para elegirlos.
            $compañeros = ["compañero 1", "compañero 2", "compañero 3"];

            // Recorremos el array y creamos cada <option> con PHP
            foreach ($compañeros as $id => $nombre) {
                echo "<option value='".($id+1)."'>$nombre</option>";
            }
            ?>
        </select>

        <br><br>

        <label for="mensaje">Quiero agradecerte:</label><br>

        <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

        <br><br>

        <input type="submit" value="Enviar Agradecimiento">

    </form>

</body>
</html>
