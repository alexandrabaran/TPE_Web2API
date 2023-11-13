<?php

require_once './app/models/model.php';

class CategoryModel extends Model{

    function getAllCategories() {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    function getCategorybyId($id){
        $query = $this->db->prepare('SELECT * FROM categories WHERE category_id = ?');
        $query->execute([$id]);
        $category = $query->fetch(PDO::FETCH_OBJ);
        return $category;
    }

    function insertCategory($name){
        $query = $this->db->prepare('INSERT INTO categories(category_name) VALUES (?)');
        $query->execute([$name]);
        return $this->db->lastInsertId();
    }

    function deleteCategory($id){
        $query = $this->db->prepare('DELETE FROM categories WHERE category_id = ?');
        $query->execute([$id]);
    }

    function updateCategory($name, $id){
            $query = $this->db->prepare('UPDATE categories SET category_name = ? WHERE category_id = ?');
            $query->execute([$name, $id]);
        }

}

