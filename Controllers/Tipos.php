<?php
    include_once "../Class/Tipos.php";
    $tipo = $_POST["tipo"];
    (!Tipos::Existe($tipo)) && Tipos::Insertar($tipo);
    $tipo = Tipos::BuscarId($tipo);