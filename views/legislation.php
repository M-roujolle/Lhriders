<?php
require "../controllers/controller_lesgislation.php";
require '../controllers/controller_users.php';
require "../data/data.php";
include "../templates/header.php";
?>

<div class="principalePictLegis">
</div>

<h1 class="text-center mt-5">Legislation Française des balades moto</h1>
<p class="text-center ms-5 me-5 fw-bold pt-5">Chez LH Riders nous savons très bien que tu ne vas pas tout lire... Libre à toi de lire ou non ces conditions, nous te conseillons vivement de prendre connaissance de ces articles et nous te rappelons que LH Riders se décharge de toute responsabilités en cas de problèmes... Et comme tu l'as déja entendu : "Nul n'est censé ignorer la Loi". C'est pourquoi nous t'avons fait un condensé des règles primordiales à connaitre ;)</p>
<p style="color: red" class="ms-5 me-5 fw-bold text-center">En bref :</p>

<div class="text-center pb-5 fw-bold">
    <div class="card border border-danger">
        <div class="card-body">
            <li>Aucune déclaration nécessaire pour une sortie de moins de 50 motos (on parle bien ici de moto et non de participants).</li>
            <li>Pour les rassemblements de 50 motos et plus :</li>
            <li>Le dossier doit être envoyé au préfet, au moins deux mois avant la date de la concentration.</li>
            <li>Si celle-ci se déroule sur plusieurs départements, le dossier doit être adressé en 3 exemplaires à chaque préfet concerné.</li>
            <li>Si la balade se déroule sur plus de 20 départements, la déclaration doit être faite au ministère de l’Intérieur.</li>
        </div>
    </div>
</div>

<p class="text-center ms-5 me-5">Le rassemblement entre deux roues et les balades motos organisées sur route sont incontournables dans le cercle des motards. Ces balades en groupe renforcent la fraternité et l’expérience des pilotes de deux roues. Toutefois, la concentration de véhicules terrestres occasionne des difficultés de circulation pour les autres automobilistes. De ce fait, l’organisateur de la sortie à plusieurs cylindrés doit déclarer ou demander une autorisation aux préfectures concernant par l’itinéraire emprunté.
    Mais attention, une randonnée à moto en groupe nécessite une organisation pointue et une déclaration administrative, et non pas uniquement pour le plaisir de rouler.
    Faut-il déclarer une balade en groupe à moto ? À qui déclarer sa virée à moto à plusieurs ? Dans quels cas déclarer son road trip avec plusieurs pilotes est-ce une obligation ?</p>

<?php foreach ($legis as $key => $value) { ?>
    <div class="card mb-3 ms-5 me-5 border border-success" style="max-width: 50 rem;">
        <div class="row g-0 pt-5">
            <div class="col-md-4">
                <img src="../<?= $value["pictures"] ?>" class="img-fluid rounded-start ms-5 pb-5" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $value["name"] ?></h5>
                    <p class="card-text pt-5"><?= $value["description"] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


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
                    <input class="mt-3 buttondark text-center" type="submit" value="Connexion" name="connexion">
                </form>
            </div>
            <div class="modal-footer">
                <a class="buttonorange text-white position-absolute top-100 start-50 translate-middle" href="./registration.php">S'inscrire</a>
            </div>
        </div>
    </div>
</div>
<p class="text-center">
    <a href="https://balades-moto.com/declarer-balade-moto-quels-cas/#:~:text=La%20d%C3%A9claration%20est%20obligatoire%20pour,tout%20simplement%20g%C3%AAner%20la%20circulation."> Source: balades-moto.com </a>
</p>

<?php
include "../templates/footer.php";
?>