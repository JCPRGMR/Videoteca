<?php
    include_once "../Connection/Conexion.php";
    Class Tipos extends Conexion{
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM tipos ORDER BY f_registro_tipo DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $count = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $count;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Existe($value){
            try {
                $sql = "SELECT COUNT(*) FROM tipos WHERE des_tipo = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $value, PDO::PARAM_STR);
                $stmt->execute();
                $count = $stmt->fetchColumn();
                return ($count > 0);
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Insertar($value){
            try {
                $sql = "INSERT INTO tipos(
                    des_tipo, 
                    f_registro_tipo, 
                    f_modificacion_tipo
                    ) VALUES(?,?,?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $value, PDO::PARAM_STR);
                $stmt->bindParam(2, Conexion::$alter, PDO::PARAM_STR);
                $stmt->bindParam(3, Conexion::$alter, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function BuscarId($value){
            try {
                $sql = "SELECT id_tipo FROM tipos WHERE des_tipo = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $value, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetchColumn();
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }