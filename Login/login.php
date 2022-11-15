<?php 
    $connection=mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($connection,"local_adidas");


    $usuario = $_POST['user'];
    $contrasenia = $_POST['password'];

    session_start();
    $_SESSION['usuario']=$usuario;

    $request = "SELECT * FROM usuarios WHERE usuario= '$usuario' && password = '$contrasenia' ";

    $result = mysqli_query($connection,$request);

    $row = mysqli_num_rows($result);


    if ($row > 0){
        $_SESSION["usuario"] = $usuario;
        header('location:../listar.php');
    }else {
        header('location:loginfail.html');
    }

    mysqli_free_result($result);

    mysqli_close($connection);




  ?>