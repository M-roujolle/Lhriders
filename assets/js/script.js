// modal dynamique

window.addEventListener("DOMContentLoaded", function () {
  if (document.getElementById("alertconfirm")) {
    Swal.fire(
      "Félicitations votre compte à été crée avec succès, il sera bientôt validé par notre équipe",
      "Une fois votre compte validé, vous pourrez créer vos balades !",
      "success"
    );
  }
});
