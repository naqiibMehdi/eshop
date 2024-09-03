<header class="bg-body-secondary p-5">
    <div class="container">
        <div class="col-12">
            <h1><?php echo $title ?></h1>
            <?= $this->displayMessages(); ?>
        </div>
    </div>
</header>

<section class="container">
    <form action="<?= ROOT_URL ?>index" method="post" class="border p-3">
        <div class="row">
            <div class="">
                <div class="mb-3">
                    <label for="category">Categorie</label>
                    <select name="id_category" id="category" class="form-select">
                    <option value="">- Sélectionnez une catégorie</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?= $category["id_category"] ?>" <?= $category["id_category"] === $idSelected["id_category"] ? "selected" : "" ?>><?= $category["category_name"] ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="size">Taille</label>
                    <select name="id_size" id="size" class="form-select">
                    <option value="">- Pour combien de personnes</option>
                    <?php foreach($sizes as $size): ?>
                        <option value="<?= $size["id_size"] ?>" <?= $size["id_size"] === $idSelected["id_size"] ? "selected" : "" ?>><?= ucfirst($size["size_name"]) ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
                <div class="mt-5 mb-3">
                    <button type="submit" class="btn btn-outline-dark w-100 reset">Reset</button>
                </div>
            </div>
        </div>
    </form>
</section>

<main class="d-flex justify-content-center align-items-start gap-5 my-5 px-3">
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