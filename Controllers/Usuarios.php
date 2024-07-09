<?php
    include_once "../Class/Usuarios.php";
    var_dump($_POST);

    if(isset($_POST["iniciar"])){
        session_start();
        $_SESSION["usuario"] = Usuarios::Login($_POST);
        (!$_SESSION["usuario"])? header("Location: ../") : header("Location: ../View/Prensa.php");
    }