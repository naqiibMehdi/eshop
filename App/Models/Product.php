<?php

namespace App\Models;

use Core\Model;

class Product extends Model
{
  protected $table = "product";

  public function insert($reference, $product_name, $description, $main_img, $price, $stock, $category_id, $size_id, $active)
  {
    $stmt = $this->db->prepare("
    INSERT INTO {$this->table} (reference, product_name, description, main_img, price, stock, category_id, size_id, active)
    VALUES (:reference, :product_name, :description, :main_img, :price, :stock, :category_id, :size_id, :active)
    ");

    $stmt->execute([
      "reference" => strtolower($reference),
      "product_name" => strtolower($product_name),
      "description" => $description,
      "main_img" => $main_img,
      "price" => $price,
      "stock" => $stock,
      "category_id" => $category_id,
      "size_id" => $size_id,
      "active" => $active,
    ]);

    return $stmt->rowCount();
  }

  public function checkReference(string $reference): int
  {
    $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE reference = ?");

    $stmt->execute([$reference]);
    return $stmt->rowCount();
  }

  public function getProducts(): array
  {
    $stmt = $this->db->prepare("
      SELECT * FROM {$this->table}
      JOIN category ON {$this->table}.category_id = category.id_category
      JOIN size ON {$this->table}.size_id = size.id_size
    ");

    $stmt->execute([]);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function filterProducts(int|null $id_category = null, int|null $id_size = null)
  {
    $values = [];
    $query = "
      SELECT id_product, reference, product_name, product.description, main_img, price, stock FROM {$this->table}
      JOIN category ON {$this->table}.category_id = category.id_category
      JOIN size ON {$this->table}.size_id = size.id_size
      WHERE 1
    ";

    if($id_category){
      $query .= " AND id_category = :id_category";
      $values["id_category"] = $id_category;
    }

    if($id_size){
      $query .= " AND id_size = :id_size";
      $values["id_size"] = $id_size;
    }

    $stmt = $this->db->prepare($query);

    $stmt->execute($values);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
}