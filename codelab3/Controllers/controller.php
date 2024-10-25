<?php 
namespace Controller;

class Controller{
    var $controllerName;
    var $controllerMethod;

    public function getControllerAttribute(){
        return [
            'controllerName' => $this->controllerName,
            'controllerMethod' => $this->controllerMethod
        ];
    }
}
?>