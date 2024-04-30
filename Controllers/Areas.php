<?php
    include_once "../Class/Areas.php";
    
    $area = $_POST["area"];
    (!Areas::Existe($area)) && Areas::Insertar($area);
    $area = Areas::BuscarId($area);