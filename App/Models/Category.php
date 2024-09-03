<?php

namespace App\Models;

use Core\Model;

class Category extends Model{

  protected $table = "category";

  public function insertCategory(string $category_name, string $description = "")
  {
    $stmt = $this->db->prepare("INSERT INTO {$this->table} (category_name, description) VALUES(:name, :description)");

    $stmt->execute([
      "name" => $category_name,
      "description" => $description,
    ]);

    return $stmt->rowCount();

  }

  public function checkCategory(string $category_name): int
  {
    $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE category_name = :name");

    $stmt->execute([
      "name" => strtolower($category_name),
    ]);

    return $stmt->rowCount();

  }

  public function getCategories(): array
  {
    $stmt = $this->db->query("SELECT * FROM {$this->table}");
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
  }

  public function deleteCategory(int $id): void
  {
    $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_category = :id");

    $stmt->execute([
      "id" => $id,
    ]);

  }

}