<?php
    include_once "../Connection/Conexion.php";
    
    class Departamentos extends Conexion{
        public static function BuscarDes($id){
            try {
                $sql = "SELECT des_departamento FROM departamentos WHERE id_departamento = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id, PDO::PARAM_STR);
                $resultado = $stmt->fetchColumn();
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }