<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? "Admin" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      li{
        list-style: none;
      }

      .form_add_product{
        display: grid;
        grid-template-columns: 1fr 350px;
      }

      

    </style>
  </head>
  <body>
    <header class="p-5 bg-success text-white d-flex align-items-center justify-content-between">
        <h1 class="m-0">Dashboard Admin</h1>
        <nav>
          <ul class="m-0 p-0 d-flex gap-3">
            <li><a href="<?= ROOT_URL ?>admin/shop" class="text-white text-decoration-none list-style-none">Accueil</a></li>
            <li><a href="<?= ROOT_URL ?>admin/products" class="text-white text-decoration-none list-style-none">Liste des produits</a></li>
          </ul>
        </nav>
    </header>  
    <div class="container mt-5">

        <?= $content; // affichage du $template ?>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>