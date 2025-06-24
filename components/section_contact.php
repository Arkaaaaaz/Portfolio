<section id="section-contact">

    <h2 id="title-contact" class="text-center">Pour me contacter !</h2>

    <form class="form" action="traitement.php" id="form-captcha" method="POST">

        <div class="mb-3">
            <label for="nom" class="form-label"></label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="NOM*" required>

        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label"></label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="PRÉNOM*" required>

        </div>

        <div class="mb-3">
            <label for="email" class="form-label"></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL*" required>

        </div>

        <div class="mb-3">

            <label for="tel" class="form-label"></label>
            <input type="tel" class="form-control" id="tel" name="tel" placeholder="Téléphone (optionnel)">

        </div>

        <div class="form-floating">
            <label for="message" class="form-label"></label>
            <textarea class="form-control" placeholder="Leave a comment here" id="message" name="message"
                style="height: 200px" required></textarea>

            <label for="message">VOTRE MESSAGE...</label>

        </div>

        <div class="form-check">

            <input class="form-check-input" type="checkbox" id="gridCheck" name="checkform" required>

            <label class="form-check-label" for="gridCheck">

                En soumettant ce formulaire, j'accepte que les informations saisies soient utilisées pour être
                recontacter.
            </label>

        </div>

        <input type="submit" class="btn btn-primary btn-modif g-recaptcha" id="BTNFORM" />

    </form>

</section>