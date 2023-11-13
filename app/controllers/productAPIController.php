<?php

// _  :

require_once 'app/models/productModel.php';
require_once 'app/controllers/APIController.php';

class productAPIController extends APIController {
    protected $model; //private? view?

    function __construct()
    {
        $this ->model = new productModel();
    }

    function getAll(){
        $products = $this->model->getProducts();
        $this->view->response($products, 200); //if y else necesarios como en category
    }

    public function updateProduct($params = []) {
        $product_id = $params[':ID'];
        $product = $this->model->getProduct($product_id);
    
        if ($product) {
            $body = $this->getData();
            $product_name = $body->product_name;
            $category_id = $body->category_id;
            $product_price = $body->product_price;
            $product_stock = $body->product_stock;
    
            $product = $this->model->updateProduct($product_name, $category_id, $product_price, $product_stock);
            $this->view->response("Product id=$product_id actualizado con éxito", 200);
        }
        else 
            $this->view->response("Product id=$product_id no encontrado", 404);
    }

   // function orderByPrice (){ //poner el sort y order en algun lado?
        //chequear si tiene precio
        //todos los precios a un arreglo
        //imprimir}
    }
