<?php

namespace App\Controllers\Front;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Core\Controller;

Class IndexController extends Controller
{
    public function index()
    
    {
        
        $id_category = null;
        $id_size = null;
        $params = explode("/", $_SERVER["REQUEST_URI"]);

        if(array_key_exists(3, $params)){
            $id_category = (int)$params[3];
        }
        if(array_key_exists(4, $params)){
            $id_size = (int)$params[4];
        }

        $this->render('front', 'Front/index', [
            'title' => 'Boutique',
            "products" => (new Product)->filterProducts(),
            "categories" => (new Category)->getCategories(),
            "sizes" => (new Size)->getSizes(),
            "idSelected" => $this->getIdForSelected()
        ]);
    }

    public function filter()
    {
        $id_category = null;
        $id_size = null;
        $params = explode("/", $_SERVER["REQUEST_URI"]);

        if(array_key_exists(3, $params)){
            $id_category = (int)$params[3];
        }
        if(array_key_exists(4, $params)){
            $id_size = (int)$params[4];
        }

        $this->render('front', 'Front/index', [
            'title' => 'Boutique',
            "products" => (new Product)->filterProducts($id_category, $id_size),
            "categories" => (new Category)->getCategories(),
            "sizes" => (new Size)->getSizes(),
            "idSelected" => $this->getIdForSelected()
        ]);
    }

    public function getIdForSelected()
    {
        $listId = [
            "id_category" => 0,
            "id_size" => 0
        ];
        $params = explode("/", $_SERVER["REQUEST_URI"]);

        if(array_key_exists(3, $params)){
            $listId["id_category"] = (int)$params[3];
        }
        if(array_key_exists(4, $params)){
            $listId["id_size"] = (int)$params[4];
        }

        return $listId;
    }

}