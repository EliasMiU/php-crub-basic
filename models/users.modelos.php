<?php

require_once "conexion.php";

class ModeloUser {
    static public function mdlRegistro($tabla, $datos) {

        /**
         * $stmt es de PDOStatement, que se usa para preparar consultas
         */

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) VALUES (:nombre, :email, :password)");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt = null;

    }

    static public function mdlGetUsers($tabla, $columna, $valor){


        if( $columna == null && $valor == null){
            /**
             * DATE FORMAT: para darle formato a la fecha que viene desde la 
             * base de datos. es una de als tantas funciones ue tiene SQL.
             */
    
            $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla");
            $stmt->execute();
    
            return $stmt->fetchAll();
    
            $stmt = null;
        } else {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $columna = :$columna");
                $stmt->bindParam(":".$columna, $valor, PDO::PARAM_STR);
    
                $stmt->execute();
        
                return $stmt->fetch();
        
                $stmt = null;
            } catch (PDOException $e) {
                return false;
            }
            
        
        }
    }

    static public function mdlUpdateUser($tabla, $valor){

        try{

            $stmt =  Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email, password=:password WHERE id = :id");
            $stmt->bindParam(":nombre", $valor["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $valor["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $valor["password"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $valor["id"], PDO::PARAM_INT);

            $stmt -> execute();

            return "ok";

            $stml = null;

        } catch (PDOException $e) {
            return false;
        }
        
    }


    static public function mdlDeleteUser($tabla, $valor){

        try{

            $stmt =  Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

            $stmt -> execute();

            return "ok";

            $stmt = null;

        } catch (PDOException $e) {
            return false;
        }

    }
}