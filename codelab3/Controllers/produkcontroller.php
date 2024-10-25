<?php 
namespace Controller;

include "Traits/responseformatter.php";
include "Controllers/controller.php";

use Traits\Responseformatter;

class Produkcontroller extends Controller{
    use Responseformatter;
    public function __construct(){
        $this->controllerName = "Get All Product";
        $this->controllerMethod = "GET";
    }

    public function getAllProduct(){
        $dummydata = [
            'air mineral', 
            'mineral air', 
            'kebab', 
            'jus jambu'
        ];

        $response = [
            'controller_atributte' => $this->getControllerAttribute(),
            'product' => $dummydata
        ];

        return $this->responseFormatter(200, "Success", $response);
    }
}
?>