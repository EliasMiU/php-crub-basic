<?php
  
  
  class EnlacesPaginas {
    
    public static function enlacesPaginasModel($enlacesModel){
      
        if( $enlacesModel == "inicio" || 
            $enlacesModel == "ingreso" || 
            $enlacesModel == "registro" || 
            $enlacesModel == "salir" ||
            $enlacesModel == "editar" ){
                
                $url_module  =  "views/pages/".$enlacesModel.".php";
        } else if ($enlacesModel == "index"){
            $url_module  =  "views/pages/inicio.php";

        } else {
            $url_module  =  "views/pages/inicio.php";
        }

        return $url_module;

    }
  }


?>