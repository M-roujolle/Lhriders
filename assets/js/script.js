// modal dynamique

window.addEventListener("DOMContentLoaded", function () {
  if (document.getElementById("alertconfirm")) {
    let timerInterval;
    Swal.fire({
      title: "Compte créer avec succès !",
      html: "Cette fenêtre ce fermera dans <b></b> milliseconds.",
      timer: 3000,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading();
        const b = Swal.getHtmlContainer().querySelector("b");
        timerInterval = setInterval(() => {
          b.textContent = Swal.getTimerLeft();
        }, 100);
      },
      willClose: () => {
        clearInterval(timerInterval);
      },
    }).then((result) => {
      /* Read more about handling dismissals below */
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log("I was closed by the timer");
      }
    });
  }
});
