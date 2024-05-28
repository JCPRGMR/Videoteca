<?php
    include_once "../Connection/Conexion.php";
    Class Actividad extends Conexion{
        public static function Existe($value){
            try {
                $sql = "SELECT COUNT(*) FROM actividades WHERE des_actividad = ?";
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
                $sql = "SELECT * FROM actividades ORDER BY f_registro_actividad DESC";
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
                $sql = "INSERT INTO actividades(
                    des_actividad, 
                    f_registro_actividad, 
                    f_modificacion_actividad
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
                $sql = "SELECT id_actividad FROM actividades WHERE des_actividad = ?";
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