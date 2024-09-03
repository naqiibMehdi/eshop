<?php 

namespace Core;

require_once ROOT_PATH . '/../Config/config.php';

class Model
{
    protected $table;
    protected $db;

    public function __construct()
    {
        if(!$this->db) {
            try {
                $this->db  = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch(\PDOException $e) {
                exit('Erreur : ' . $e->getMessage());
            }
        }
    }

}