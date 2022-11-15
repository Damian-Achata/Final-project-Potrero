<?php
    
    //conexion
    $connection=mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($connection, "local_adidas");

    //2)almacenar los datos post
    $tipo_de_prenda =$_POST ['tipo_de_prenda'];
    $marca=$_POST ['marca'];
    $talle=$_POST ['talle'];
    $precio=$_POST ['precio'];
    //Para agregar img usar...
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    //orden sql
    //INSERT INTO nombre_table(campos tabla) VALUES ('valores')  siempre deben ir en el mismo orden
    $request = "INSERT INTO ropa (id,tipo_de_prenda,marca,talle,precio,imagen)
    VALUES ('','$tipo_de_prenda','$marca','$talle','$precio','$imagen')";
    
    //Ejecutar la orden e ingresar los datos
    mysqli_query($connection,$request);
    //ejecutar la consulta
    //redirigir al index(opcional)
    header('location:index.html');



?>