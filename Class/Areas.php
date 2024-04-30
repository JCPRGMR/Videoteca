<?php
    include_once "../Connection/Conexion.php";
    Class Areas extends Conexion{
        public static function Existe($value){
            try {
                $sql = "SELECT COUNT(*) FROM areas WHERE des_area = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $value, PDO::PARAM_STR);
                $stmt->execute();
                $count = $stmt->fetchColumn();
                return ($count > 0);
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM areas ORDER BY f_registro_area DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $count = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $count;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Insertar($value){
            try {
                $sql = "INSERT INTO areas(
                    des_area, 
                    f_registro_area, 
                    f_modificacion_area
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
                $sql = "SELECT id_area FROM areas WHERE des_area = ?";
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