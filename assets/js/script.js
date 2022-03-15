window.addEventListener("DOMContentLoaded", function () {
  if (document.getElementById("alertconnexion")) {
    Swal.fire("Vous êtes connecté", "", "success");
  }
});

window.addEventListener("DOMContentLoaded", function () {
  if (document.getElementById("alertconfirm")) {
    Swal.fire(
      "Compte crée avec succès, en attente de validation",
      "Une fois validé, vous pourrez créer vos balades !",
      "success"
    );
  }
});

window.addEventListener("DOMContentLoaded", function () {
  if (document.getElementById("alertlogout")) {
    Swal.fire("Déconnexion", "A bientôt", "info");
  }
});
