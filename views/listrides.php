<?php
require '../controllers/controller_listrides.php';

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
    <title>Liste des utilisateurs</title>
</head>

<body>
    <h1 class="text-center mb-5 mt-2">Liste des sorties moto</h1>
    <div class="container d-flex justify-content-center">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>ID BALADE</th>
                    <th>TITRE</th>
                    <th>PLUS D'INFO</th>
                    <th>SUPPRIMER</th>
                </tr>
            </thead>
            <tbody>


                <?php foreach ($arrayride as $value) { ?>
                    <tr>
                        <td scope="row"><?= $value['ride_id'] ?></td>
                        <td><?= $value['ride_title'] ?></td>
                        <td><a class="btn btn-primary" href="../views/modifride.php?id=<?= $value['ride_id'] ?>">
                                +
                            </a>
                        </td>
                        <td><a class="btn btn-danger" href="modifuser.php?id=<td><?= $value['ride_id'] ?></td>">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>






                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $value['ride_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <input type="hidden" value="<?= $value['ride_id'] ?>" name="user_id">
                                            <button type="submit" name="idsupp" class="btn btn-danger">Supprimer</button>
                                        </form>
                                        <a href="listusers.php" class="btn btn-primary btn-sm">Retour</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a class="btn btn-danger mt-2 ms-2" href="admincontrol.php"> Retour panel controle</a>
        <a class="btn btn-danger mt-2 ms-2" href="registration.php"> Retour à l'inscription</a>
    </div>
</body>

</html>