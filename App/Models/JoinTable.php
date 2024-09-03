<?php

namespace App\Models;

use Core\Model;

class JoinTable extends Model{

  protected $tableP = "product";
  protected $tableC = "category";
  protected $tableS = "size";


  public function getProductsWithCategoriesAndSizes(string $category_name = "", string $size_name = "")
  {
    $stmt = $this->db->prepare("
      SELECT category_name, size_name FROM {$this->tableP}
      JOIN {$this->tableC} ON {$this->tableP}.category_id = {$this->tableC}.id_category
      JOIN {$this->tableS} ON {$this->tableP}.size_id = {$this->tableS}.id_size
      WHERE category_name = :category_name AND size_name = :size_name
    ");

    $stmt->execute([
      "category_name" => $category_name,
      "size_name" => $size_name
    ]);
  }
}