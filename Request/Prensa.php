<pre>
<?php
    if(isset($_POST["subir"])){
        if(strlen($_POST["tipo"]) > 0){
            include_once "../Controllers/Tipos.php";
        }
        if(strlen($_POST["area"]) > 0){
            include_once "../Controllers/Areas.php";
        }
        if(isset($_FILES["video"])){
            include_once "../Controllers/Videos.php";
        }
    }
    header("Location: ../View/Prensa.php");