// modal dynamique
window.addEventListener("DOMContentLoaded", function () {
  if (document.getElementById("alertconnexion")) {
    Swal.fire(
      "Vous êtes maintenant connecté",
      "Vous pouvez créer vos balades ! ",
      "success"
    );
  }
});

window.addEventListener("DOMContentLoaded", function () {
  if (document.getElementById("alertconfirm")) {
    Swal.fire(
      "Félicitations votre compte à été crée avec succès, il sera bientôt validé par notre équipe",
      "Une fois votre compte validé, vous pourrez créer vos balades !",
      "success"
    );
  }
});

window.addEventListener("DOMContentLoaded", function () {
  if (document.getElementById("alertlogout")) {
    Swal.fire("Déconnexion", "A bientôt", "info");
  }
});

window.addEventListener("DOMContentLoaded", function () {
  if (document.getElementById("alertride")) {
    Swal.fire("Tracé crée avec succès", "En attente de validation", "success");
  }
});
