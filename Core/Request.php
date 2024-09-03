<?php

namespace Core;

class Request 
{
    protected $fileFormat = ['png', 'jpg', 'jpeg', 'gif', 'webp'];

    public function getUrl()
    {
        $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
        // Exemple : 
        // Pour l'url : http://localhost/PHP_14_Kali/eshop/controller/methode/arg1/arg2/arg3
        // On récupère : /PHP_14_Kali/eshop/controller/methode/arg1/arg2/arg3
        // Pour l'url : http://monsite.fr/
        // On récupère : /

        // On enlève les potentiels informations $_GET
        // Exemple : 
        // Pour l'url
        $url = strtok($url, '?');
        
        if(strpos($url, PATH) == 0) {
            $url = substr($url, strlen(PATH));
        }

        return $url;
    }

    public function getFileFormat()
    {
        return $this->fileFormat;
    }

    public function setFileFormat($formats)
    {
        if(is_array($formats)) {
            $this->fileFormat = $formats;
        }
    }

    public function isPost()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }
        return false;
    }

    public function isGet()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            return true;
        }
        return false;
    }

    public function getPostData()
    {
        return $_POST;
    }

    public function getGetData()
    {
        return $_GET;
    }

    public function getPost($name)
    {
        return (isset($_POST[$name])) ? trim($_POST[$name]) : null;
    }

    public function getGet($name)
    {
        return (isset($_GET[$name])) ? trim($_GET[$name]) : null;
    }

    public function getFile($name)
    {
        if(!empty($_FILES[$name]['name'])) {
            return $_FILES[$name];
        }
        return null;
    }

    public function fileFormatValidation($file)
    {
        $formats = $this->fileFormat;

        $f = $this->getFile($file);

        if($f) {
            $ext = strrchr($f['name'], '.');
            $ext = substr(strtolower($ext), 1);

            if(in_array($ext, $formats)) {
                return true;
            }
            return false;
        }
        return false;
    }
}