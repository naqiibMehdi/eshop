<?php

namespace Core;

class Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function render($layout, $template, $params = [])
    {
        // $layout => le template général (les parties communes à nos pages)
        // $template => la partie spécifique de nos pages
        // $params => les outils que l'on souhaite recevoir dans nos $template

        extract($params); // crée une variable pour chaque index d'un tableau, cette variable contient la valeur correspondante

        $content = '';
        $templatePath = ROOT_PATH . '/../App/Views/' . $template . '.php';
        if (file_exists($templatePath)) {
            ob_start(); // Démarre une mise en tampon, les affichages ne seront pas déclenchés tout de suite, c'est nous qui les déclenchons ensuite
            // https://www.php.net/manual/fr/function.ob-start.php
            require_once $templatePath;

            $content = ob_get_clean(); // permet de stocker ce qui a été mis en tampon dans cette variable.
        }

        $layoutPath = ROOT_PATH . '/../App/Views/Layout/' . $layout . '.php';
        if (file_exists($layoutPath)) {
            ob_start();

            require_once $layoutPath;
            return ob_end_flush();
        } else {
            return $content;
        }
    }

    public function displayMessages()
    {
        $display = '';
        $errors = $this->session->get('errors');
        if ($errors && is_array($errors)) {
            $display = '<div class="alert alert-danger"><ul class="mb-0">';
            foreach ($errors as $error) {
                $display .= '<li>' . htmlspecialchars($error) . '</li>';
            }
            $display .= '</ul></div>';

            // Supprime les messages d'erreur de la session après les avoir affichés
            $this->session->remove('errors');
        }
        $success = $this->session->get('success');
        if ($success && is_array($success)) {
            $display = '<div class="alert alert-success"><ul class="mb-0">';
            foreach ($success as $line) {
                $display .= '<li>' . htmlspecialchars($line) . '</li>';
            }
            $display .= '</ul></div>';

            // Supprime les messages d'erreur de la session après les avoir affichés
            $this->session->remove('success');
        }
        return $display;
    }

    // User est connecté
    public function userIsConnected()
    {
        return $this->session->has('user');
    }

    // User est admin
    public function userIsAdmin()
    {
        return $this->userIsConnected() && $this->session->get('user')['status'] == 'ROLE_ADMIN';
    }

    // Gestion du menu
    public function getMenu()
    {
        $menus = [
        'Boutique'=> ROOT_URL,
        ];

        if ($this->userIsConnected()) {
            $menus['Profil'] = ROOT_URL . 'profile';
            $menus['Déconnexion'] = ROOT_URL . 'login/signout';
        } else {
            $menus['Connexion'] = ROOT_URL . 'login';
            $menus['Inscription'] = ROOT_URL . 'register';
        }

        $menus['Contact'] = ROOT_URL . 'contact';

        if($this->userIsAdmin()) 
        {
            $menus['Gestion'] = ROOT_URL . 'admin/';
        }
    }
}
