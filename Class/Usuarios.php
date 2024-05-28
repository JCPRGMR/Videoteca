<?php
    include_once "../Connection/Conexion.php";
    class Usuarios extends Conexion{
        public static function Login($datos){
            try {
                $sql = "SELECT * FROM usuarios WHERE username = ? AND contrasenas = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $datos["username"]);
                $stmt->bindParam(2, $datos["clave"]);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
    }