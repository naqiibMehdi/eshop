<header class="">
    <div class="container">
        <div class="col-12">
            <?= $this->displayMessages(); ?>
        </div>
    </div>
</header>


<div class="form_add_product container my-5">
    <div class="form_product">
      <form action="<?= ROOT_URL ?>admin/shop/addProduct" method="post" enctype="multipart/form-data" class="border p-3">
          <div class="row">
              <div class="">
                  <div class="mb-3 form-group">
                    <label for="main_img">Ajouter une image</label>
                    <input type="file" class="form-control-file" id="main_img" name="main_img">
                  </div>
                  <div class="mb-3">
                      <label for="reference">Référence</label>
                      <input type="text" class="form-control" id="reference" name="reference">
                  </div>
                  <div class="mb-3">
                      <label for="product_name">Nom du produit</label>
                      <input type="text" class="form-control" id="product_name" name="product_name">
                  </div>
                  <div class="mb-3">
                      <label for="description">Description</label>
                      <textarea type="text" class="form-control" id="description" name="description"></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="price">Prix</label>
                      <input type="text" class="form-control" id="price" name="price" placeholder="Prix séparé par un point (ex: 12,50)">
                  </div>
                  <div class="mb-3">
                      <label for="stock">Stock</label>
                      <input type="text" class="form-control" id="stock" name="stock">
                  </div>
                  <div class="mb-3">
                      <label for="category">Categorie</label>
                      <select name="category_id" id="category" class="form-select">
                      <option>- Sélectionnez une catégorie</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?= $category["id_category"] ?>"><?= ucfirst($category["category_name"]) ?></option>
                        <?php endforeach ?>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="size">Categorie</label>
                      <select name="size_id" id="size" class="form-select">
                      <option>- Pour combien de personnes</option>
                        <?php foreach($sizes as $size): ?>
                            <option value="<?= $size["id_size"] ?>"><?= ucfirst($size["size_name"]) ?></option>
                        <?php endforeach ?>
                      </select>
                  </div>
                  <div class="mb-3 mt-4">
                    <input class="form-check-input" type="checkbox" value="true" id="active" name="active">
                    <label class="form-check-label" for="active">
                        Activer le produit en ligne
                    </label>
                  </div>
                  <div class="mt-5 mb-3">
                      <button type="submit" class="btn btn-outline-dark w-100">Ajouter un produit</button>
                  </div>
              </div>
          </div>
      </form>
    </div>

    <div>
      <form action="<?= ROOT_URL ?>admin/shop/addCategory" method="post" class="">
          <div class="row">
              <div class="p-4">
                  <div class="">
                      <label for="category_name" class="mb-2">Ajouter une catégorie</label>
                      <input type="text" class="form-control" id="category_name" name="category_name">
                  </div>
                  <div class="mt-3">
                      <button type="submit" class="btn btn-outline-dark w-100">Ajouter</button>
                  </div>
              </div>
          </div>
      </form>

      <table class="table table-striped">
        <thead>
            <tr>
                <th>Categorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category): ?>
                <tr>
                    <td><?= ucfirst($category["category_name"]) ?></td>
                    <td>
                        <form action="<?= ROOT_URL ?>admin/shop/deleteCategory" method="post">
                            <input type="hidden" value="<?= $category["id_category"] ?>" name="delete_category">
                            <button type="submit" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
      </table>

      <form action="<?= ROOT_URL ?>admin/shop/addSize" method="post" class="border-top mt-5">
          <div class="row">
              <div class="p-4">
                  <div class="">
                      <label for="category_name" class="mb-2">Ajouter une taille</label>
                      <input type="text" class="form-control" id="category_name" name="size_name">
                  </div>
                  <div class="mt-3">
                      <button type="submit" class="btn btn-outline-dark w-100">Ajouter</button>
                  </div>
              </div>
          </div>
      </form>
      <table class="table table-striped">
        <thead>
            <tr>
                <th>Taille</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sizes as $size): ?>
                <tr>
                    <td><?= ucfirst($size["size_name"]) ?></td>
                    <td>
                        <form action="<?= ROOT_URL ?>admin/shop/deleteSize" method="post">
                            <input type="hidden" value="<?= $size["id_size"] ?>" name="delete_size">
                            <button type="submit" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>