<?php 
include "Controllers/produkcontroller.php";

use Controller\Produkcontroller;

$productController = new Produkcontroller();
echo $productController->getAllProduct();

?>