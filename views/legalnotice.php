<?php
require "../controllers/controller_legalnotice.php";
require "../controllers/controller_users.php";
include "../templates/header.php";
?>

<div class="principalePictLegalnotice d-none d-lg-block">
</div>

<!-- DECRIPTION DU SITE----------------------------------------------------------------------------------------------------------------->

<h1 class="text-center pt-5 text-white">Mentions Légales</h1>
<div class="mt-5 row text-center m-0 text-white">
    <div class="row">
        <div class="col col-lg-12">

            <p class="pb-5">Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004 pour
                la
                Confiance dans l’économie numérique, dite L.C.E.N., il est porté à la connaissance des
                utilisateurs et
                visiteurs, du site lhriders.fr, les présentes mentions légales. La connexion et la navigation
                sur le Site par l’Utilisateur implique l'acceptation intégrale et sans réserve
                des présentes mentions légales.Ces dernières sont accessibles sur le Site à la rubrique «

            <p class="text-center pb-5"> ARTICLE 1 - L'EDITEUR :<br>
                L’édition et la direction de la publication du Site est assurée par Maxime Roujolle, domicilié au
                1295
                Route du Hameau d'Enfer, dont le numéro de téléphone est 0660769121, et l'adresse e-mail
                roujolle.maxime@gmail.com.</p>

            <p class="text-center pb-5"> ARTICLE 2 - L'HEBERGEUR :<br>
                L'hébergeur du Site est la société LHRiders, dont le siège social est situé a
                Saint Romain de Colbosc, avec le numéro de téléphone : 0660769121 et le contact mail : roujolle.maxime@gmail.com</p>

            <p class="text-center pb-5"> ARTICLE 3 - ACCES AU SITE :<br>
                Le Site est accessible en tout endroit, 7j/7, 24h/24 sauf cas de force majeure, interruption
                programmée ou non et pouvant découlant d’une nécessité de maintenance.
                En cas de modification, interruption ou suspension du Site, l'Editeur ne saurait être tenu
                responsable.</p>

            <p class="text-center pb-5"> ARTICLE 4 - COLLECTE DES DONNEES :<br>
                Le Site assure à l'Utilisateur une collecte et un traitement d'informations personnelles dans le
                respect
                de la vie privée conformément à la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux
                fichiers
                et aux libertés.
                En vertu de la loi Informatique et Libertés, en date du 6 janvier 1978, l'Utilisateur dispose d'un
                droit
                d'accès, de rectification, de suppression et d'opposition de ses données personnelles. L'Utilisateur
                exerce ce droit :

                <li>par mail à l'adresse email roujolle.maxime@gmail.com</li>
                <li>via un formulaire de contact</li>

                Toute utilisation, reproduction, diffusion, commercialisation, modification de toute ou partie du
                Site,
                sans autorisation de l’Editeur est prohibée et pourra entraînée des actions et poursuites
                judiciaires
                telles que notamment prévues par le Code de la propriété intellectuelle et le Code civil.
                Pour plus d’informations, se reporter aux CGU du site lhriders.fr accessible à la rubrique "CGU"
                Pour plus d'informations en matière de cookies, se reporter à la Charte en matière de cookies du
                site
                lhriders.fr accessible à la rubrique "Gestion des Cookies"
            </p>

            <a href="http://legalplace.fr">Rédigé sur legalplace</a>

        </div>
    </div>
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

<?php
include "../templates/footer.php";
?>