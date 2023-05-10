<?php
    class ControllersUsers {

        static public function ctrForm(){
            if( isset($_POST["name"]) ) {
                
                $tabla = "users";
                $datos = array("nombre" => $_POST["name"], "email"=>$_POST["email"], "password" => $_POST["password"]);

                $respuesta = ModeloUser::mdlRegistro($tabla, $datos);

                return $respuesta;
            }
        }

        /**
         * GETUSER METODO del controladora para traer los datos 
         * de todo los usuarios registrados.
         */
        static public function ctrGetUsers($column, $value){
            
            $tabla = "users";
            $respuesta = ModeloUser::mdlGetUsers($tabla, $column, $value);
            return $respuesta;

        }

        /**
         * METODO para el inicio de sesion de los usuarios.
         */

        public function crtLoginUsers(){

            if(isset($_POST["loginEmail"])){
                $tabla = "users";
                $columna = "email";
                $valor = $_POST["loginEmail"];

                $user = ModeloUser::mdlGetUsers($tabla, $columna, $valor);

                if($user != false) {

                    if( $user["email"] == $_POST["loginEmail"] && $user["password"] == $_POST["loginPassword"] ){

                        $_SESSION["userLogin"] = "ok"; 
    
                        echo '<script>
    
                            if(window.history.replaceState){

                                window.history.replaceState(null, null, window.location.href);

                            }

                            window.location = "index.php?action=inicio";

                    
                        </script>';
    
                    } else {
    
                        echo '<script>
    
                            if(window.history.replaceState){
    
                            window.history.replaceState(null, null, window.location.href);
    
                            }
                        
                        </script>';
    
    
                        echo '<div class="alert alert-danger">Error al ingresar, email o conraseña no coinside.</div>';
    
                    }
                }else {
                    echo '<div class="alert alert-danger">Se ha producido un error.</div>';
                }



            }

        }


        public function ctrUpdateUser(){

            if( isset($_POST["updateName"]) ) {

                $wordpass = $_POST["updatePassword"] != "" ? $_POST["updatePassword"] : $_POST["passwordHidden"];
                $tabla = "users";                
                $datos = array(
                    "nombre"     => $_POST["updateName"], 
                    "email"      => $_POST["updateEmail"], 
                    "password"   => $wordpass,
                    "id"         => $_POST["idHidden"]
                );

                $respuesta = ModeloUser::mdlUpdateUser($tabla, $datos);

                if($respuesta != false) {
    
                    echo '<script>

                        if(window.history.replaceState){

                        window.history.replaceState(null, null, window.location.href);

                        }
                    
                    </script>';

                    echo '<div class="alert alert-success">se han realizado los registros</div>';
                    
                } else {
                    echo '<div class="alert alert-danger">Se ha producido un error.</div>';
                }

            }
        }


        public function ctrDeleteUser(){
            if ( isset($_POST["deleteUser"]) ) {

                $tabla = "users";
                $valor = $_POST["deleteUser"];

                $resultDelete = ModeloUser::mdlDeleteUser($tabla, $valor);

                if($resultDelete != false) {
    
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "index.php?pagina=inicio";
                    </script>';
                } else {
                    echo '<div class="alert alert-danger">Se ha producido un error.</div>';
                }
            }
        }
    }
?>