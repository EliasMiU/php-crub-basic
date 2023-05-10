<?php

    class Conexion {
        static public function conectar(){

            #Nombre del servidor, nombre de la base de datos, usuraio, contraseña.
            $link = new PDO("mysql:host=localhost;dbname=phpcurso", "root", "");
            $link->exec("set names utf8");
            return $link;

        }
    }

?>