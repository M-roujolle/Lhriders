<?php
require '../controllers/controller_listusers.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/script.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Liste des utilisateurs</title>
</head>

<body>
    <h1 class="selectColor pt-3 pb-3 text-center">Liste des utilisateurs</h1>
    <div class="row m-0 p-0 col-lg-12">
        <table class="table table-striped table-dark mt-5">
            <thead>
                <tr>
                    <th class="d-none d-lg-table-cell">ID</th>
                    <th>PSEUDO</th>
                    <th class="d-none d-lg-table-cell">PRENOM</th>
                    <th class="d-none d-lg-table-cell">NOM</th>
                    <th class="d-none d-lg-table-cell">MAIL</th>
                    <th>VALIDATION</th>
                    <th class="d-none d-lg-table-cell">ROLE</th>
                    <th>MODIFIER</th>
                    <th>SUPPRIMER</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allUsersArray as $users) { ?>
                    <tr>
                        <td class="d-none d-lg-table-cell" scope="row"><?= $users['user_id'] ?></td>
                        <td><?= $users['user_pseudo'] ?></td>
                        <td class="d-none d-lg-table-cell"><?= $users['user_firstname'] ?></td>
                        <td class="d-none d-lg-table-cell"><?= $users['user_lastname'] ?></td>
                        <td class="d-none d-lg-table-cell"><?= $users['user_mail'] ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="userstatus" value="<?= $users['user_validate'] ?>">
                                <input name="idvalider" type="hidden" value="<?= $users['user_id'] ?>">
                                <button name="valider" class="buttonblue" type="submit"><?= $users['user_validate'] == 0 ? "Valider" : "Suspendre" ?></button>
                            </form>
                        </td>
                        <td class="d-none d-lg-table-cell"><?= $users['role_id'] == 2 ? "User" : "Admin" ?></td>
                        <td><a class="buttonblue" href="modifuser.php?id=<?= $users["user_id"] ?>">
                                Modifier
                            </a></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="buttonred" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $users["user_id"] ?>">
                                <i class="bi bi-trash"></i> </button>
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $users["user_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Etes vous certain de vouloir supprimer cet utilisateur ?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="" method="POST">
                                            <input type="hidden" value="<?= $users["user_id"] ?>" name="user_id">
                                            <button type="submit" name="idsupp" class="buttondelete">Supprimer</button>
                                        </form>
                                        <a href="listusers.php" class="buttonreturn">Retour</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="text-center mb-5">
        <a class="buttondark mt-2 ms-2" href="admincontrol.php"> Retour panel controle</a>
        <a class="buttondark mt-2 ms-2" href="home.php"> Retour ?? l'accueil</a>
    </div>
</body>

</html>