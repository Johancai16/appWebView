<?php
    require_once "Conexion.php";

    $conexionDam = new Conexion();
    $conexion = $conexionDam->conectar();
    
    $sql = $conexion->prepare("
        SELECT * FROM TiposDocumentos
    ");
    $sql->execute();
    $tiposDocumentos = $sql->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario de pacientes</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<h2>
<img src="icono.png" alt="Icono de usuario" class="icono"> 
    Registro de pacientes</h2>
<form action="validar.php" method="post">
    <label for="nombre">Nombre completo:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>
    <label for="correo_electronico">Correo electrónico:</label>
    <input type="text" id="correo_electronico" name="correo_electronico" required><br><br>
    
    <label for="">Tipo de documento:</label>
    <select name="tipoDocumento" id="tipoDocumento" required>
        <option value="0">Seleccione un tipo de documento</option>
      
    <?php
        foreach ($tiposDocumentos as $tipoDocumento) {
    ?>
            <option value="<?=$tipoDocumento['id_tipoDocumento']?>"><?=$tipoDocumento['nombreDocumento']?></option>
    <?php
        }
    ?>
    </select> <br><br>


    <label for="numeroDocumento">Número de documento:</label>
    <input type="number" id="numeroDocumento" name="numeroDocumento" required><br><br>

    <button type="submit">Registrar paciente</button>
    
</form>

<a href="mostrar.php">
    <button>Ver lista de pacientes registrados</button>
</a>

<script src="validador.js"></script>

</body>
</html> 