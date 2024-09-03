<?php  

namespace App\Models;

use Core\Model;

class User extends Model 
{
    protected $table = 'user';

    public function checkByEmail($email)
    {
        $stmt = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $stmt->execute(['email' => $email]);

        return $stmt->rowCount(); // 0 ou 1
    }

    public function checkByUsername($username)
    {
        $stmt = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $stmt->execute(['username' => $username]);

        return $stmt->rowCount(); // 0 ou 1
    }

    public function insert($email, $password, $username, $lastname, $firstname, $address, $city, $postal_code)
    {
        $stmt = $this->db->prepare('
            INSERT INTO ' . $this->table . ' 
            (email, password, username, lastname, firstname, address, city, postal_code) 
            VALUES 
            (:email, :password, :username, :lastname, :firstname, :address, :city, :postal_code)
        ');
    
        $stmt->execute([
            'email' => $email,
            'password' => $password,
            'username' => $username,
            'lastname' => $lastname,
            'firstname' => $firstname,
            'address' => $address,
            'city' => $city,
            'postal_code' => $postal_code,
        ]);
    
        return $stmt->rowCount();
    }

    public function login($email)
    {
        $stmt = $this->db->prepare('
            SELECT * FROM ' . $this->table . ' 
            WHERE email = :email
        ');
    
        $stmt->execute([
            'email' => $email,
        ]);
    
        return $stmt->fetch(\PDO::FETCH_OBJ); // false ou objet avec les info user
    }
    
}