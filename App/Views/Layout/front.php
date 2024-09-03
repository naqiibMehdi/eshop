<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? "Eshop" ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- css projet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto&display=swap" rel="stylesheet">

    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }


        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Playfair Display', serif;
        }

        .card-img-top{
            height: 200px;
            object-fit:cover;
        }

      .card-title{
        font-weight: bold;
        text-transform: capitalize;
      }

      main{
        height: calc(100vh - 423px)
      }
    </style>

</head>

<body>    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= ROOT_URL ?>">Eshop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= ROOT_URL ?>">Boutique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?= ROOT_URL ?>login">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?= ROOT_URL ?>register">Inscription</a>
                    </li>

                    


                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- \NAVBAR -->
    
    <?= $content; // affichage du template ?>

    <footer class="bg-dark text-white p-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    Copyright &copy; 2024                
                </div>
            </div>
        </div>        
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?= ROOT_URL ?>js/front.js"></script>
</body>

</html>