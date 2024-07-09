<?php
    Class Usuarios_actividad extends Conexion{
        public static function Insertar($post){
            try {
                $sql = "INSERT INTO usuarios_actividad(
                    remote_addr,
                    http_cookie,

                    id_fk_usuario,
                    id_fk_actividad,
                    cod_video,

                    f_registro_usuario_actividad,
                    f_modificacion_usuario_actividad
                ) VALUES(?,?, ?,?,?, ?,?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post["remote_addr"], PDO::PARAM_STR);
                $stmt->bindParam(2, $post["http_cookie"], PDO::PARAM_STR);
                $stmt->bindParam(3, $post["id_fk_usuario"], PDO::PARAM_STR);
                $stmt->bindParam(4, $post["id_fk_actividad"], PDO::PARAM_STR);
                $stmt->bindParam(5, $post["video"], PDO::PARAM_STR);

                $stmt->bindParam(6, Conexion::$alter, PDO::PARAM_STR);
                $stmt->bindParam(7, Conexion::$alter, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                throw $th;
            }
        }
    }