<?php
    // Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupère les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $message = $_POST["message"];

    // Valide les données
    if (empty($nom) || empty ($prenom) || empty($email) || empty($message)) {
        die("Tous ces champs sont obligatoires.");
    }


    // Affiche les données
    //echo "<b>Récapitulatif du message envoyé :</b><br>";
    //echo "Nom: " . $nom . "<br>";
    //echo "Prénom: " . $prenom . "<br>";
    //echo "Téléphone: " . $tel . "<br>";
    //echo "Email: " . $email . "<br>";
    //echo "Message: " . $message . "<br><br>";

    // Envoi d'email
    $to = "contact@paradisdev.fr";
    $subject = "Nouveau Message de $prenom $nom";
    $body = "Vous avez reçu un nouveau message depuis le site paradisdev.fr.\n\n";
    $body .= "Nom : $nom\n";
    $body .= "Prénom : $prenom\n";
    $body .= "Email : $email\n";
    $body .= "Téléphone : $tel\n\n";
    $body .= "Message :\n$message";
    
    $headers = "From: contact@paradisdev.fr\r\n";   // Obligé d'utiliser une adresse venant du domain car sinon IONOS bloque l'envoi du mail
    $headers .= "Reply-To: $email\r\n";             // Fait en sorte que le mail indiqué dans le formulaire soit celui utilisé lorsque l'on "répond" au mail (une fois dans la boîte mail)
    $headers .= "Content-Type: text/plain; charset=utf-8";

    if (mail($to, $subject, $body, $headers)) {
        //echo "Email envoyé avec succès.<br>";
        //echo "Redirection vers la page d'accueil dans 3 secondes...";
        //echo '<script>setTimeout(function(){ window.location.href = "index.html"; }, 3000);</script>'; // Permets de rediriger sur la page d'où le "mail" a été envoyé
        header ("Location:index.php?msg=Message bien envoyé#section-contact");
    } else {
        //echo "Échec de l'envoi de l'email.";
        header ("Location:index.php?msg=Echec de l'envoi du message#section-contact");
    }

} else {
    // Redirection si le formulaire n'a pas été soumis
    header("Location:index.php?msg=Méthode d'envoi non autorisée#section-contact");
    exit;
} ?>




