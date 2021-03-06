<?php
require "../data/data.php";
require "../controllers/controller_home.php";
include "../templates/header.php";
?>

<div class="principalePict d-none d-lg-block">
</div>

<!-- DECRIPTION DU SITE----------------------------------------------------------------------------------------------------------------->

<div class="row text-center m-0">
    <h1 class=" selectColor pt-3 pb-3">Bienvenue sur LHRiders</h1>

    <p class="pt-5 ps-5 pe-5 pb-5 fs-4 text-white">Besoin d’un bon bol d’air ? LHRiders et ses membres mettent à disposition des itinéraires pour ceux qui veulent se faire plaisir au guidon de leur deux roues.</p>

</div>

<!-- CATEGORIES DE MOTARD ---------------------------------------------------------------------------------------------------------->
<p class="text-center pb-2 selectColor pt-2 fs-4">A qui s'adresse ce site ? </p>
<div class="row justify-content-evenly m-0">
    <?php foreach ($typeOfBikers as $key => $value) { ?>
        <div class="card mb-3 mt-5 border border-white shadow pt-2 pb-2" style="max-width: 700px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../<?= $value["pictures"] ?>" class="img-fluid rounded-start" alt="catégorie de motard">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><?= $value["name"] ?></h4>
                        <p class="card-text"><?= $value["descriptif"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<!----EXEMPLES DE SORTIES---------------------------------------------------------------------------------------------------------------------------->

<p class="text-center pb-2 selectColor pt-2 mt-5 fs-4">Les balades du mois</p>

<div class="row justify-content-evenly m-0 pt-5 pb-5 text-center">
    <div class="col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d165494.3020424753!2d0.005009196031334846!3d49.600606928838886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x47e017c3893f4e43%3A0x40c14484fb684d0!2zw4l0cmV0YXQ!3m2!1d49.707006899999996!2d0.2055978!4m5!1s0x47e02f2395218b7d%3A0x5bc1867aaf33af12!2sLe%20Havre!3m2!1d49.494369999999996!2d0.107929!5e0!3m2!1sfr!2sfr!4v1641322911920!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <h5 class="card-title pt-3">Le Havre - Etretat</h5>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body shadow">
                <div class="row">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d166388.3714566132!2d-0.0815283127004559!3d49.33665865681517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x47e033a5e30f5dc5%3A0x40c14484fbceaf0!2sHonfleur!3m2!1d49.418762!2d0.233262!4m5!1s0x480a7b87e2cb2559%3A0x40c14484fbcf7a0!2sCabourg!3m2!1d49.287980999999995!2d-0.11629199999999999!5e0!3m2!1sfr!2sfr!4v1647424552877!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <h5 class="card-title pt-3">Honfleur - Cabourg</h5>
            </div>
        </div>
    </div>
</div>


<!-- SHOW YOUR BIKE --------------------------------------------------------------------------------------------------------------------------->

<p class="text-center pb-2 selectColor pt-2 mb-5 fs-4">Vos montures</p>

<div class="row justify-content-evenly gy-3 m-0 text-center">
    <?php
    foreach ($showYourBike as $key => $value) { ?>
        <div class="card border border-white pt-2" style="width: 20rem;">
            <img src="../<?= $value["pictures"] ?>" class="card-img-top" alt="motos des membres">
            <div class="card-body">
                <p class="card-text"><?= $value["model"] ?></p>
            </div>
        </div>
    <?php } ?>

</div>

<!-- MODAL ------------------------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Connexion / Inscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?login" method="POST">
                    <input type="text" class="form-control" placeholder="Pseudo" name="login">
                    <input type="password" class="form-control mt-3" placeholder="Mot de passe" name="password">
                    <input class="mt-3 buttondark text-center" type="submit" value="Connexion" name="connexion">
                </form>
            </div>
            <div class="modal-footer">
                <a class="buttonorange text-white position-absolute top-100 start-50 translate-middle" href="./registration.php">S'inscrire</a>
            </div>
        </div>
    </div>
</div>

<?php if (isset($alertlogout)) { ?>
    <span id="alertlogout"></span>
<?php } ?>

<?php
include "../templates/footer.php";
?>