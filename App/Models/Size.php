<?php

namespace App\Models;

use Core\Model;

class Size extends Model{

  protected $table = "size";

  public function insertSize(string $size_name, string $description = "")
  {
    $stmt = $this->db->prepare("INSERT INTO {$this->table} (size_name, description) VALUES(:name, :description)");

    $stmt->execute([
      "name" => $size_name,
      "description" => $description,
    ]);

    return $stmt->rowCount();

  }

  public function checkSize(string $size_name): int
  {
    $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE size_name = :name");

    $stmt->execute([
      "name" => strtolower($size_name),
    ]);

    return $stmt->rowCount();

  }

  public function getSizes(): array
  {
    $stmt = $this->db->query("SELECT * FROM {$this->table}");
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
  }

  public function deleteSize(int $id): void
  {
    $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id_size = :id");

    $stmt->execute([
      "id" => $id,
    ]);

  }

}