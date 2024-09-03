<header class="mb-5">
  <h2>Liste de produits</h2>
</header>

<main class="d-flex gap-5">
  <?php foreach($products as $product): ?>
    <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?= ROOT_URL ?>img/<?= $product["main_img"] ?>" alt="<?= $product["product_name"] ?>">
    <div class="card-body">
      <h5 class="card-title"><?= ucfirst($product["product_name"]) ?></h5>
      <p class="card-text">Description:<br/><?= $product["description"] ?></p>
      <p class="card-text">Prix: <strong><?= $product["price"] / 100 ?>€</strong> - Quantité: <strong><?= $product["stock"] ?></strong></p>
      <a href="#" class="btn btn-success">Voir le produit</a>
    </div>
  </div>
  <?php endforeach ?>
</main>