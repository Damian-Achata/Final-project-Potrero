<?php 
//conexion a la db
$connection=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($connection,"local_adidas");
//almacenar dato del GET generar la variable id a utilizar
$id=$_GET['id'];

$request="SELECT * FROM ropa WHERE id=$id";
//ejecutar la orden y almacenar en una variable el resultado
$answer=mysqli_query($connection,$request);
//transformar el registro en un array
$data=mysqli_fetch_array($answer);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Ropa </title>
</head>
<body>
    <?php 
    $tipo_de_prenda=$data["tipo_de_prenda"];
    $marca=$data["marca"];
    $talle=$data["talle"];
    $precio=$data["precio"];
    $imagen=$data['imagen'];?>

    <h2>Modificar</h2>
    <p>Ingrese los datos a modificar</p>
    <form action="" method="post" enctype="multipart/form-data">
            <label>Tipo de prenda</label>
            <input type="text" name="tipo_de_prenda" placeholder="Tipo de Prenda" value="<?php echo "$tipo_de_prenda"; ?>"> 
            <label>Marca</label>
            <input type="text" name="marca" placeholder="Marca" value="<?php echo "$marca"; ?>">
            <label>Talle</label>
            <input type="text" name="talle" placeholder="Talle" value="<?php echo "$talle"; ?>">
            <label>Precio</label>
            <input type="text" name="precio" placeholder="Precio" value="<?php echo "$precio"; ?>">
            <label>Imagen</label>
            <input type="file" name="imagen" placeholder="imagen">
            <input type="submit" name="guardar_cambios" value="Guardar Cambios">
            <button type="submit" name="Cancelar" formaction="index.html">Cancelar</button>
    </form>
    <?php
     if(array_key_exists('guardar_cambios',$_POST))
     {
        $connection=mysqli_connect("127.0.0.1", "root", "");
        mysqli_select_db($connection, "local_adidas");

        $tipo_de_prenda=$_POST['tipo_de_prenda'];
        $marca=$_POST['marca'];
        $talle=$_POST['talle'];
        $precio=$_POST['precio'];
        $imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));

        //orden sql

        $request="UPDATE ropa SET tipo_de_prenda='$tipo_de_prenda',
        marca='$marca', talle='$talle',precio='$precio', imagen='$imagen' WHERE id=$id ";

        mysqli_query($connection,$request);

        header('location:index.html');



    }


    
    ?>
</body>
</html>