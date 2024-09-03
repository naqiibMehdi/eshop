<?php

namespace App\Controllers\Front;

use Core\Controller;
use Core\Request;

use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        // echo 'Hello World Register';
        $this->render('front', 'Front/register', [
            'title' => 'Inscription',
        ]);
    }

    public function signup()
    {
        $request = new Request;
        $user = new User;

        if ($request->isPost()) {
            $email = $request->getPost('email');
            $password = $request->getPost('password');
            $username = $request->getPost('username');
            $lastname = $request->getPost('lastname');
            $firstname = $request->getPost('firstname');
            $address = $request->getPost('address');
            $city = $request->getPost('city');
            $postal_code = $request->getPost('postal_code');

            $errors = [];

            // format du mail
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Le format du mail est invalide';
            }

            // unicité du mail
            if ($user->checkByEmail($email)) {
                $errors[] = 'Cet email est déjà utilisé';
            }

            // format du mot de passe, 1majuscule, 1minuscule, 1chiffre, 1caractère special et au moins 4 caractères
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{4,}$/', $password)) {
                $errors[] = 'Le format du mot de passe est invalide. Il doit contenir au moins 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère special et au moins 4 caractères';
            }

            // format du pseudo
            if (!$username) {
                $errors[] = 'Le pseudo est obligatoire';
            }

            // unicité du pseudo
            if ($user->checkByUsername($username)) {
                $errors[] = 'Ce pseudo est déjà utilisé';
            }

            if (!$lastname) {
                $errors[] = 'Le prenom est obligatoire';
            }

            if (!$firstname) {
                $errors[] = 'Le nom est obligatoire';
            }

            if (!$address) {
                $errors[] = "L'adresse est obligatoire";
            }

            // code postal obligatoire, que des chiffres et une taille de 5
            if (!$postal_code || !is_numeric($postal_code) || iconv_strlen($postal_code) !== 5) {
                $errors[] = 'Le code postal est obligatoire et doit contenir 5 chiffres';
            }

            if (!$city) {
                $errors[] = 'La ville est obligatoire';
            }

            // hashage du mot de passe
            $password = password_hash($password, PASSWORD_DEFAULT);

            if ($errors) {
                $this->session->set('errors', $errors);
                header('Location: ' . ROOT_URL . 'register');
                exit;
            } else {
                $user->insert($email, $password, $username, $lastname, $firstname, $address, $city, $postal_code);
                $this->session->set('success', ['Inscription ok']);
                header('Location: ' . ROOT_URL . 'login');
                exit;
            }
        }
        
    }
}
