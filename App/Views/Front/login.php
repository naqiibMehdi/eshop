<header class="bg-body-secondary p-5">
    <div class="container">
        <div class="col-12">
            <h1><?php echo $title ?></h1>
            <?= $this->displayMessages(); ?>
        </div>
    </div>
</header>

<div class="container my-5">
    <form action="<?= ROOT_URL ?>login/signin" method="post" class="border p-3">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password">Mot de passe</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-dark w-100">Se connecter</button>
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