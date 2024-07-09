<?php
    include_once '../Class/Videos.php';
    include_once '../Class/Actividad.php';
    include_once '../Class/Usuarios_actividad.php';
    session_start();
    // PROCEDIMIENTO PARA SUBIR EL VIDEO
    $cod_video = date("Ymd", strtotime($_POST["fecha"])) . substr($_POST["area"], 0, 3);
    $cod = intval(substr(Videos::BuscarCodigo($cod_video), -3)) + 1;
    $cod_video .= sprintf("%03d", $cod);
    $extension = pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);
    $disco = match (($_POST["subir"])) {
        "1" => "D:/prensa/",
        "2" => "D:/programacion/",
    };
    $ruta = $disco . $cod_video . "." . $extension;
    

    // PROCEDIMIENTO PARA CARGAR LA IMAGEN
    if(isset($_FILES["miniatura"])){
        if (!file_exists("D:/programacion/miniaturas")) {
            mkdir("D:/programacion/miniaturas", 0777, true);
        }
        $miniatura = $cod_video . "." . pathinfo($_FILES["miniatura"]["name"], PATHINFO_EXTENSION);
    }

    // PROCEDIMIENTOS PARA CARGAR UN VIDEOS
    if(move_uploaded_file($_FILES["video"]["tmp_name"], $ruta)){
        $array = [
            "titulo" => $_POST["titulo"],
            "detalles" => $_POST["detalles"],
            "cod_video" => $cod_video,
            "ruta" => $ruta,
            "ruta_apache" => ($_POST["subir"] == 1) ? "/prensa/" . $cod_video . "." . $extension : "/programacion/" . $cod_video . "." . $extension,
            "nombre_original" => $_FILES["video"]["name"],
            "miniatura" => (isset($_FILES["miniatura"]))? $miniatura : null,
            "id_fk_departamento" => intval($_POST["subir"]),
            "id_fk_area" => $area,
            "id_fk_tipo" => $tipo,
            "fecha" => $_POST["fecha"],
        ];
        var_dump($array);
        if(isset($_FILES["miniatura"]) && strlen(isset($_FILES["miniatura"]["name"])) > 0){
            move_uploaded_file($_FILES["miniatura"]["tmp_name"], "D:/programacion/miniaturas/" . $miniatura);
        }
        $actividad = ($_POST['subir'] == 1) ? "INSERTAR" : "";
        (!Actividad::Existe($actividad)) && Actividad::Insertar($actividad);
        $array = [
            "remote_addr" => $_SERVER['REMOTE_ADDR'],
            "http_cookie" => $_SERVER['HTTP_COOKIE'],
            "id_fk_usuario" => $_SESSION["usuario"]->id_usuario,
            "id_fk_actividad" => Actividad::BuscarId($actividad),
            "video" => $cod_video,
        ];
        Usuarios_actividad::Insertar($array);
        Videos::Insertar((object) $array);
    }
    
    header("Location: ../View/Prensa.php");