<?php

namespace App\Controllers\Back;

use Core\Request;
use Core\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;

Class ShopController extends Controller
{
    public function index()
    {
        // echo 'Hello World Register';
        $this->render('back', 'Back/index', [
            'title' => 'Dashboard Admin',
            "categories" => (new Category)->getCategories(),
            "sizes" => (new Size)->getSizes(),
        ]);
    }

    public function addCategory()
    {
        $request = new Request;
        $category = new Category;
        $errors = [];

        if($request->isPost()){
            $nameCategory = $request->getPost("category_name");

            if(!$nameCategory){
                $errors[] = "Le nom de la catégorie doit être remplie !";
            }

            if($category->checkCategory($nameCategory)){
                $errors[] = "Le nom de cette catégorie existe déjà !";
            }

            

            if(!empty($errors)){
                $this->session->set('errors', $errors);
                header('Location: ' . ROOT_URL . 'admin/shop');
                exit;
            }else{
                $category->insertCategory($nameCategory);
                header('Location: ' . ROOT_URL . 'admin/shop');
                exit;
            }
        }
    }

    public function deleteCategory()
    {
        $request = new Request;
        $category = new Category;

        if($request->isPost()){
            $idCategory = (int) $request->getPost("delete_category");

            if($idCategory){
                $category->deleteCategory($idCategory);
                header('Location: ' . ROOT_URL . 'admin/shop');
                exit;
            }
        }
    }


    // function for Size
    public function addSize()
    {
        $request = new Request;
        $size = new Size;
        $errors = [];

        if($request->isPost()){
            $nameSize = $request->getPost("size_name");

            if(!$nameSize){
                $errors[] = "Le champ pour la taille doit être remplie !";
            }

            if($size->checkSize($nameSize)){
                $errors[] = "Le nom de cette taille existe déjà !";
            }

            

            if(!empty($errors)){
                $this->session->set('errors', $errors);
                header('Location: ' . ROOT_URL . 'admin/shop');
                exit;
            }else{
                $size->insertSize($nameSize);
                header('Location: ' . ROOT_URL . 'admin/shop');
                exit;
            }
        }
    }

    public function deleteSize()
    {
        $request = new Request;
        $size = new Size;

        if($request->isPost()){
            $idSize = (int) $request->getPost("delete_size");

            if($idSize){
                $size->deleteSize($idSize);
                header('Location: ' . ROOT_URL . 'admin/shop');
                exit;
            }
        }
    }

    public function addProduct()
    {
        $request = new Request;
        $product = new Product;
        $errors = [];

        if($request->isPost()){
            $reference = $request->getPost("reference");
            $product_name = $request->getPost("product_name");
            $description = $request->getPost("description");
            $price = $request->getPost("price");
            $stock = (int) $request->getPost("stock");
            $category_id = (int) $request->getPost("category_id");
            $size_id = (int) $request->getPost("size_id");
            $main_img = $request->getFile("main_img");
            $active = $request->getPost("active");

            if(!$reference){
                $errors[] = "La référence ne doit pas être vide";
            }

            if($product->checkReference($reference)){
                $errors[] = "Cette référence existe déjà, veuillez en saisir une autre";
            }

            if(!$product_name){
                $errors[] = "Le nom du produit ne doit pas être vide";
            }
            if(!$description){
                $errors[] = "La description ne doit pas être vide";
            }
            if($stock < 0){
                $errors[] = "Le stock ne peut pas être inférieur à zéro";
            }
            if(!preg_match("/^[\d]+(\.)?[\d]*$/", $price)){
                $errors[] = "Le prix se compose seulement de chiffres et/ou de chiffres séparé par un point";
            }

            if($main_img){
                if(!$request->fileFormatValidation("main_img")){
                    $errors[] = "Seules les extensions suivantes sont accpetées: PNG, JPG, JPEG, WEBP, GIF";
                }else{
                    $extension = strtolower(pathinfo($main_img["name"])["extension"]);
                    $renameFile = uniqid() . "." . $extension;
                    $destinationImage = ROOT_PATH . "/img/" . $renameFile;
                    copy($main_img["tmp_name"], $destinationImage);
                }
            }


            if(!empty($errors)){
                $this->session->set("errors", $errors);
                header("Location: " . ROOT_URL . "admin/shop");
                exit;
            }else{
                $product->insert(
                    $reference, 
                    $product_name,
                    $description,
                    $main_img ? $renameFile : "default.png",
                    (int)($price * 100),
                    $stock,
                    $category_id,
                    $size_id,
                    $active === "true" ? 1 : 0
                );
                header("Location: " . ROOT_URL . "admin/shop");
                exit;
            }
        }
    }
}