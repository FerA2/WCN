<?php
    class Conexion{
        public static function Conectar(){
            $server = "localhost:33065";
            $user = "root";
            $password = "";
            $database = "wcnext";

            // Establece conexion, si falla muestra el mensaje de error.
            try{
                $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $user, $password);
                return $conn;
            }catch(PDOException $e){
                die('Connection Failed: ' . $e->getMessage());
                return;
            }
        }

    }
?>
