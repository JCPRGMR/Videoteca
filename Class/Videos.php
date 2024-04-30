<?php
    include_once "../Connection/Conexion.php";
    Class Videos extends Conexion{
        public static function BuscarCodigo($codigo){
            $codigo = $codigo . "%";
            try {
                $sql = "SELECT cod_video FROM videos WHERE cod_video LIKE ? ORDER BY id_video DESC LIMIT 1";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $codigo, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetchColumn();
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Insertar($post){
            try {
                $sql = "INSERT INTO videos(
                    cod_video,
                    titulo,
                    detalles,
                    ruta,

                    ruta_apache,
                    nombre_original,
                    miniatura,

                    id_fk_departamento,
                    id_fk_area,
                    id_fk_tipo,

                    fecha_subida,
                    f_registro_video,
                    f_modificacion_video
                ) VALUES(?,?,?,?, ?,?,?, ?,?,?, ?,?,?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->cod_video, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->titulo, PDO::PARAM_STR);
                $stmt->bindParam(3, $post->detalles, PDO::PARAM_STR);
                $stmt->bindParam(4, $post->ruta, PDO::PARAM_STR);
                $stmt->bindParam(5, $post->ruta_apache, PDO::PARAM_STR);
                $stmt->bindParam(6, $post->nombre_original, PDO::PARAM_STR);
                $stmt->bindParam(7, $post->miniatura, PDO::PARAM_STR);
                $stmt->bindParam(8, $post->id_fk_departamento, PDO::PARAM_STR);
                $stmt->bindParam(9, $post->id_fk_area, PDO::PARAM_STR);
                $stmt->bindParam(10, $post->id_fk_tipo, PDO::PARAM_STR);
                $stmt->bindParam(11, $post->fecha, PDO::PARAM_STR);
                $stmt->bindParam(12, Conexion::$alter, PDO::PARAM_STR);
                $stmt->bindParam(13, Conexion::$alter, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Mostrar($departamento_id){
            try {
                $sql = "SELECT * FROM vista_videos WHERE id_departamento = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $departamento_id, PDO::PARAM_INT);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Ver($id_video){
            try {
                $sql = "SELECT * FROM vista_videos WHERE id_video = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id_video, PDO::PARAM_INT);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }