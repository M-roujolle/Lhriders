<?php
require "../controllers/controller_advicemaintenance.php";
require "../controllers/controller_users.php";
require "../data/data.php";
include "../templates/header.php";
?>


<div class="principalePictAdvicemaintenance">
    <div class="text-center pt-4 text-white">
        <h1>Conseils pour bien débuter et entretien</h1>
        <p>Tout motard qui se respect menage sa monture ! Tu trouveras ici des astuces et conseils pour organiser, préparer et anticiper au mieux tes promenades. N'oublies jamais que le risque zéro n'existe pas ! </p>

    </div>
</div>
<h2 class="text-center pt-5 pb-5">10 conseils pour rouler serein</h2>


<div class="row justify-content-evenly gy-5 m-0 text-center">
    <?php foreach ($consEnt as $key => $value) { ?>
        <div class="card shadow" style="width: 18rem;">
            <img src="../<?= $value["pictures"] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $value["name"] ?></h5>
                <p class="card-text"><?= $value["description"] ?></p>
            </div>
        </div>
    <?php } ?>
</div>
<p class="text-center pt-5">
    <a href="https://www.motoblouz.com/enjoytheride/conseils-moto/10459-conseils-jeune-permis-moto-2017-04-14">Source: Motoblouz</a>
</p>

<h3 class="text-center mt-5 pt-3 pb-3 selectColor">Sélections de vidéos présentées par High Side</h3>


<div class="row justify-content-evenly m-0 pt-5 pb-2 text-center">
    <?php foreach ($vidConsEnt as $key => $value) { ?>
        <div class="col-lg-4">
            <div class="card mb-5">
                <div class="card-body shadow">
                    <div class="container">
                        <?= $value["iframe"] ?> </div>
                    <h5 class="card-title pt-3"><?= $value["name"] ?></h5>
                    <p class="card-text"><?= $value["description"] ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<p class="text-center">
    <a href="https://www.youtube.com/c/HighSide-officiel">Source: High side</a>
</p>

<!-- MODAL ------------------------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Connexion / Inscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="text" class="form-control" placeholder="Pseudo" name="login">
                    <input type="password" class="form-control mt-3" placeholder="Mot de passe" name="password">
                    <input class="mt-3 btn btn-outline-primary text-center" type="submit" value="Connexion" name="connexion">
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success position-absolute top-100 start-50 translate-middle" href="./registration.php">S'inscrire</a>
            </div>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script>
    if (<?= $errorConnect ?? false ?>)
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $errormessage ?>',
        })
</script>
</body>

</html>