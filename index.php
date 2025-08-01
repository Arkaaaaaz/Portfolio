<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PORTFOLIO | Thomas PARADIS</title>
    <meta name="description" content="">
    <meta name="author" content="Thomas Paradis">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6LcBJ2YrAAAAAHzI9rXXoq0PrmjEjzs3K8_osqtK"></script>

</head>

<body>
    <?php include 'components/header.php'; ?>
    <main>

        <?php include 'components/section_accueil.php'; ?>

        <?php include 'components/section_about.php'; ?>

        <?php include 'components/section_experience.php'; ?>

        <?php include 'components/section_portfolio.php'; ?>

        <?php include 'components/section_contact.php'; ?>
        <!-- La div est là pour le bouton qui permet de retourner en haut de page -->
        <div>

            <a href="#" class="haut-page"><i class="fa-solid fa-arrow-up"></i></a>

        </div>

    </main>

    <?php include 'components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>


    <script src="https://www.google.com/recaptcha/api.js?render=6LcBJ2YrAAAAAHzI9rXXoq0PrmjEjzs3K8_osqtK"></script>

    <script>
        grecaptcha.ready(function () {
            const form = document.getElementById('form-captcha');
            form.addEventListener("submit", function (e) {
                e.preventDefault(); // empêche l'envoi automatique
                grecaptcha.execute('6LcBJ2YrAAAAAHzI9rXXoq0PrmjEjzs3K8_osqtK', { action: 'submit' }).then(function (token) {
                    const input = document.createElement("input");
                    input.type = "hidden";
                    input.name = "g-token";
                    input.value = token;
                    form.appendChild(input);
                    form.submit(); // soumet le formulaire après ajout du token
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const h2 = document.getElementById("title-contact");

            const url = new URL(window.location.href);
            const msg = url.searchParams.get("msg");

            if (msg) {
                h2.textContent = msg;

                // Nettoyage de l'URL sans recharger
                url.searchParams.delete("msg");
                window.history.replaceState({}, document.title, url.pathname + url.hash);

                // Après 10s, on remet le titre original
                setTimeout(() => {
                    h2.textContent = "Pour me contacter !";
                }, 3000); // c'est en ms
            }
        });
    </script>

    <script> 

        const datefooter = new Date ()
        document.getElementById("datefooter").textContent = datefooter.getFullYear();
    </script>


</body>

</html>