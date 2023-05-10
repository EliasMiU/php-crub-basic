<?php

  class MvcController {

    #Llamada a la plantilla

    public function getTemplate(){
      include "views/template.php";
    }

    #Interaccion del usuario
    public function enlacesPaginasControllers(){
      if(isset($_GET["action"])){
        $enlacesControllers = $_GET["action"];
      } else {
        $enlacesControllers = "index";
      }


      $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesControllers);
      include $respuesta;
    }

  }

?>