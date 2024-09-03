<?php

namespace App\Controllers\Front;

use Core\Controller;
use Core\Request;

use App\Models\User;

Class LoginController extends Controller
{
    public function index()
    {
        // echo 'Hello World Register';
        $this->render('front', 'Front/login', [
            'title' => 'Connexion',
        ]);
    }

    public function signin()
    {
        $request = new Request;
        $user = new User;

        if($request->isPost()) {
            $email = $request->getPost('email');
            $password = $request->getPost('password');

            $errors = [];

            $userData = $user->login($email);

            if($userData)
            {
                // vérification du password
                if(password_verify($password, $userData->password)) {
                    // email et password ok
                    $userTab = [];

                    foreach ($userData as $index => $value) {
                        if($index != 'password') {
                            $userTab[$index] = $value;
                        }
                    }
                    // var_dump($userTab);
                    //on stocke les infos de l'utilisateur dans la session
                    $this->session->set('user', $userTab);
                    // var_dump($_SESSION);
                    // on redirige vers la page d'accueil
                    header('Location: ' . ROOT_URL);
                    exit;

                } else {
                    $errors[] = 'Cet email n\'existe pas ou le mot de passe est incorrect.';
                }

            } else {
                $errors[] = 'Cet email n\'existe pas ou le mot de passe est incorrect.';
            }

            if ($errors) {
                $this->session->set('errors', $errors);
                header('Location: ' . ROOT_URL . 'login');
                exit;
            }

        }
    }

    // Déconnexion
    public function signout()
    {
        $this->session->remove('user');
        header('location:' . ROOT_URL . 'login');
        exit;
    }
}