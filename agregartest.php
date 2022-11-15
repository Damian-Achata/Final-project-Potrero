<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
    if (!isset($usuario)) {
        header('location:./Login/login.html');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Ropa</title>
    <link href="./styles/styleagregar.css" rel="stylesheet">
</head>
<body>
    <h1>Tienda de Ropa</h1>
    <button type="submit" ><a href="index.html">Inicio </a></button>
    <button type="submit" ><a href="listar.php">Lista De Ropa </a></button>
    <button type="submit" ><a href="agregar.html">Agregar Ropa </a></button>

    <h2>Agregar Ropa</h2>
    <p>Ingrese los datos de la prenda</p>

    <section>
    <form method="POST" action="agregar.php" enctype="multipart/form-data">
        <label>Tipo de prenda:</label>
        <input type="text" name="tipo_de_prenda" placeholder="Tipo de prenda" required>
        <label>Marca</label>   
        <input type="text" name="marca" placeholder="Marca del producto" required>
        <label>Talle</label>
        <input type="text" name="talle" placeholder="Talle" required>
        <label>Precio</label>
        <input type="text" name="precio" placeholder="Precio" required>
        <label>Imagen del producto</label>
        <input type="file" name="imagen" placeholder="Imagen de muestra" required>
        <input type="submit" name="submit" value="Ingresar">

    </form>
    </section>
</body>
</html>