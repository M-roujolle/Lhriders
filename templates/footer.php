<footer>
    <div class="footer-basic mt-5 text-center selectColor pb-5 pt-5">
        <ul class="list-inline">
            <li class="list-inline-item">
                <a class="nav-link active text-white" aria-current="page" href="../views/contact.php">Contact</a>
            </li>
            <li class="list-inline-item">
                <a class="nav-link active text-white" aria-current="page" href="../views/cgu.php">Conditions génerales d'utilisation</a>
            </li>
            <li class="list-inline-item">
                <a class="nav-link active text-white" aria-current="page" href="../views/legalnotice.php">Mentions Légales</a>
            </li>
            <li class="list-inline-item">
                <a class="nav-link active text-white" href="./legislation.php">Législation</a>
            </li>
        </ul>
        <p class="copyright">©LH Riders 2022</p>
    </div>
</footer>

<?php if (isset($alert)) { ?>
    <span id="alertconnexion"></span>
<?php } ?>

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