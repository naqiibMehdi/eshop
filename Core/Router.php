<?php 


namespace Core;

class Router
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function route()
    {
        $url = $this->getRequest()->getUrl();

        if($this->parseBackOfficeRoute($url)) {
            return;
        }
        $this->parseFrontOfficeRoute($url);
    }

    public function parseFrontOfficeRoute($url)
    {
        // on enlève les potentiels caractères qui aurait été rajouté par l'utilisateur
        $url = preg_replace('/[^a-zA-Z0-9\/_-]/', '', $url);

        // on divise l'url en segment
        $segments = explode('/', trim($url, '/'));
        /*
        exemple, si on obtient : /index/product/123/chocolat/456
        [
            0 => controller
            1 => methode
            ensuite les arguments présents dans l'url
            2 => 123
            3 => chocolat
            4 => 456
            ...
        ]
        */

        // on prépare l'appel du controller et de la methode avec des cas par défaut
        $controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'IndexController';
        $methodName = !empty($segments[1]) ? $segments[1] : 'index';

        // on place les arguments présents dans l'url dans un tableau array
        $params = array_slice($segments, 2);
        /*
        [
            0 => 123
            1 => chocolat
            2 => 456
            ...
        ]
        */

        // https://www.php.net/manual/fr/function.sprintf.php
        $controllerPath = sprintf('%s/App/Controllers/Front/%s.php', __DIR__ . DIRECTORY_SEPARATOR . '..', $controllerName);

        if(!file_exists($controllerPath)) {
            // Gestion d'erreur
            header('location:' . ROOT_URL);
            return;
        }

        $controllerClass = 'App\\Controllers\\Front\\' . $controllerName;

        // Instanciation
        $controller = new $controllerClass;

        if(!method_exists($controller, $methodName)) {
            // Gestion d'erreur
            header('location:' . ROOT_URL);
            return;
        }
        
        call_user_func_array([$controller, $methodName], $params);
        return true;
    }

    public function parseBackOfficeRoute($url)
    {
        if(substr($url, 0, 5) !== 'admin') {
            return false;
        }
        // On enlève le /admin de l'url pour les traitements suivants
        $url = substr($url, 5);

        // on enlève les potentiels caractères qui aurait été rajouté par l'utilisateur
        $url = preg_replace('/[^a-zA-Z0-9\/_-]/', '', $url);
        // on divise l'url en segment
        $segments = explode('/', trim($url, '/'));
        
        
        // on prépare l'appel du controller et de la methode avec des cas par défaut
        $controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'ShopController';
        $methodName = !empty($segments[1]) ? $segments[1] : 'index';
        
        // on place les arguments présents dans l'url dans un tableau array
        $params = array_slice($segments, 2);
        
        // https://www.php.net/manual/fr/function.sprintf.php
        $controllerPath = sprintf('%s/App/Controllers/Back/%s.php',  __DIR__ . DIRECTORY_SEPARATOR . '..', $controllerName);
        if(!file_exists($controllerPath)) {
            // Gestion d'erreur
            var_dump("salut");
            // header('location:' . ROOT_URL);
            return;
        }

        $controllerClass = 'App\\Controllers\\Back\\' . $controllerName;

        // Instanciation
        $controller = new $controllerClass;

        if(!method_exists($controller, $methodName)) {
            // Gestion d'erreur
            // header('location:' . ROOT_URL);
            return;
        }
        
        call_user_func_array([$controller, $methodName], $params);
        return true;
    }


}