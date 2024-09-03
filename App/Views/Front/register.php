<header class="bg-body-secondary p-5">
    <div class="container">
        <div class="col-12">
            <h1><?php echo $title ?></h1>
            <?= $this->displayMessages(); ?>
        </div>
    </div>
</header>

<div class="container my-5">
    <form action="<?= ROOT_URL ?>register/signup" method="post" class="border p-3">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password">Mot de passe</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="username">Pseudo</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="lastname">Nom</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
                <div class="mb-3">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="address">Adresse</label>
                    <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="mb-3">
                    <label for="postal_code">Code postal</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-dark w-100">Inscription</button>
                </div>
            </div>
        </div>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>


</div>