<?php 
// conecto la base de datos
$connection=mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($connection, "local_adidas");
// generar las variables id a borrar
$id=$_GET['id'];
//preparo la orden sql
$request="DELETE FROM ropa WHERE id=$id";


//ejecutar la consulta
mysqli_query($connection,$request);
//redirigir a index(opcional)
header('location:index.html');



?>