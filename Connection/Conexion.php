<?php
    $post = (Object)$_POST;
    date_default_timezone_set("America/Caracas");
    Class Conexion{
        #DATOS DE LA BASE DE DATOS
        private static string $host = "localhost";
        private static string $dbname = "videoteca";
        private static string $user = "root";
        private static string $password = "";
        
        #VALORES POR DEFECTO DEL TIEMPO REGISTRO
        public static $f_registro;
        public static $h_registro;
        public static $alter;

        public static function Conectar(){
            try {
                $con = "mysql:host=" . self::$host . ";dbname=" . self::$dbname;
                $stmt = new PDO($con, self::$user, self::$password);
                $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$f_registro = date('Y-m-d');
                self::$h_registro = date('H:i:s');
                self::$alter = date('Y-m-d H:i:s');
                echo 'Conexion perfecta';
                // return $stmt;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }
