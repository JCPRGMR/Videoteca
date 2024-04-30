<?php
    include_once '../Class/Videos.php';

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
        Videos::Insertar((object) $array);
    }