<?php 
    $connection=mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($connection,"local_adidas");

    $usuario = $_POST['user'];
    $contrasenia = $_POST['password'];

    session_start();
    $_SESSION['usuario']=$usuario;

    $request = "SELECT * FROM 'usuarios' WHERE $usuario ='usuario' and $contrasenia ='password' ";

    if ($usuario and $contrasenia = true ){
        header('location:index.html');
    }else {
        header('location:login.html');
    }

    


    mysqli_query($connection,$request);

    



  ?>