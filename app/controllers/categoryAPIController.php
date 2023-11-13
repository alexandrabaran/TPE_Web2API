<?php

// _  :

require_once 'app/models/category.model.php';
require_once 'app/controllers/APIController.php';

class categoryAPIController extends APIController {
    protected $model;

    function __construct()
    {
        $this ->model = new CategoryModel();
    }

    function getAll($params = []){
        if (empty($params)){
        $categories = $this->model->getAllCategories();
        $this->view->response($categories, 200);
        } else {
            $categories = $this->model->getAllCategories($params[':ID']);
            if (!empty($category)){
                 $this->view->response($categories, 200);
          } else {
                 $this->view->response (['msg' => 'La categoría con el id '.$params [':ID'].'no existe.'], 404);
        }
     }
    }

    public function updateCategory($params = []) { 
        $category_id = $params[':ID'];
        $category = $this->model->getCategorybyId($category_id);
    
        if ($category) {
            $body = $this->getData();
            $category_id = $body->category_id;
            $category_name = $body->category_name;
            $value = $this->model->updateCategory($category_id, $category_name);
            
            $this->view->response("Category id=$category_id actualizada con éxito", 200);
        }
        else 
            $this->view->response("Category id=$category_id no encontrado", 404);
    }
}