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
    <link href="./styles/styleagregar.css" rel="stylesheet">    
    <title>Tienda de Ropa</title>
</head>
<body>
    <h1>Tienda de ropa</h1>
    <button type="submit" ><a href="index.html">Inicio</a></button>
    <a href="./Login/cerrarSesion.php">Cerrar Sesion</a>
    <h2>Lista de ropa</h2>
    <p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>TIPO DE PRENDA</th>
        <th>MARCA</th>
        <th>TALLE</th>
        <th>PRECIO</th>
        <th>IMAGEN</th>
        <th>EDITAR</th>
        <th>BORRAR</th>
    </tr>
    <?php
    // 1) Conexion
    $connection=mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($connection, "local_adidas");


    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla
    $request= "SELECT*FROM ropa";


    // 3) Ejecutar la orden y obtenemos los registros
    $data= mysqli_query ($connection,$request);

    

    // 4) Mostrar los datos del registro
    // 5)Se puede crear el array dentro del mismo while sino poner $row=.... por separado y usar solo $row dentro del while
    while ($row = mysqli_fetch_array($data) ) { ?> 
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['tipo_de_prenda']; ?></td>
        <td><?php echo $row['marca']; ?></td>
        <td><?php echo $row['talle']; ?></td>
        <td><?php echo $row['precio']; ?></td>
        <td><img src="data:image/png;base64, <?php echo base64_encode($row['imagen'])?>" alt="" width="100px" height="100px"></td>
        <td><a href="editar.php?id=<?php echo $row['id'];?>">Editar</a></td>
        <td><a href="borrar.php?id=<?php echo $row['id'];?>">Borrar</a></td>
        
        </tr>
    <?php } ?>
    </table>
</body>
</html>
