<?php

require_once './app/models/productModel.php';
require_once './app/controllers/API.controller.php';

class APIProductController extends APIController {

    private $model;

    function __construct(){
        parent::__construct();
        $this-> model = new productModel();
    }

    function get($params = []) {
        if(empty($params)){
            $page = isset($_GET["page"]) && ($_GET["page"])>0 ? $_GET["page"] : 0;

            $categoryId = isset($_GET["category_id"]) && !empty($_GET["category_id"]) ? $_GET["category_id"] : 0;
            $filterQuery = ' ';

            if($categoryId !=0){
                $filterQuery = ' WHERE categories.category_id = ' . $categoryId;
            }
           
            $order = isset($_GET["product_price"]) && !empty($_GET["product_price"]) ? $_GET["product_price"] : false;
            $orderQuery = ' ';
            
            if($order == true){
                $orderQuery = ' ORDER BY product_price ';
            }
            
            $products = $this->model->getProducts($page, $filterQuery, $orderQuery);
            $this->view->response($products, 200);
        } 
        else if(!empty($params)) {
            $product = $this->model->getProduct($params[':ID']);
            if(!empty($product)) {
                $this->view->response($product, 200);
            }
            else {
                $this->view->response(
                    ['El producto con el id = ' . $params[':ID'] . ' no existe.']
                    , 404);
            }
        }
        else {
            $this->view->response(
                ['El pedido está mal formulado.'], 400);
        }

    }

    function delete($params = []) {
        $product = $this->model->getProduct($params[':ID']);
        if($product) {
            $this->model->deleteProduct($params[':ID']);
            $this->view->response(['El producto con el id = ' . $params[':ID'] . ' se eliminó correctamente.']
            , 200);
        }
        else {
            $this->view->response(
                ['El producto con el id = ' . $params[':ID'] . ' no existe.']
                , 404);
        }
    }

    function create($params = []) {
        $body = $this-> getData();
        $product_name = $body->product_name;
        $product_stock = $body->product_stock;
        $product_price= $body->product_price;
        $category_id = $body->category_id;
        $id = $this->model->addProduct($product_name, $category_id, $product_price, $product_stock);
        if($id){
            $this->view->response(['El producto con el id = ' . $id . ' se agregó correctamente.']
            , 201);
        }
    }

    function update($params = []) {
        $id = $params[':ID'];
        $product = $this->model->getProduct($id);
        if($product) {
            $body = $this-> getData();
            $product_name = $body->product_name;
            $product_stock = $body->product_stock;
            $product_price= $body->product_price;
            $category_id = $body->category_id;
            $this->model->updateProduct($product_name, $product_stock, $product_price, $category_id, $id);
            $this->view->response(['El producto con el id = ' . $id . ' se actualizó correctamente.']
            , 200);
        }
        else {
            $this->view->response(
                ['El producto con el id = ' . $id . ' no existe.']
                , 404);
        }
    }

}