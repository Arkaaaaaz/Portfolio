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
    if (empty($nom) || empty($email) || empty($message)) {
        die("Tous ces champs sont obligatoires.");
    }

    // Nettoie les données
    $nom = htmlspecialchars($nom);
    $prenom = htmlspecialchars($prenom);
    $email = htmlspecialchars($email);
    $tel = htmlspecialchars($tel);
    $message = htmlspecialchars($message);

    // Affiche les données
    echo "<b>Récapitulatif du message envoyé :</b><br>";
    echo "Nom: " . $nom . "<br>";
    echo "Prénom: " . $prenom . "<br>";
    echo "Téléphone: " . $tel . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Message: " . $message . "<br><br>";

    // Envoi d'email
    $to = "contact@paradisdev.fr";
    $subject = "Nouveau Message de $prenom $nom";
    $body = "Vous avez reçu un nouveau message depuis le site paradisdev.fr.\n\n";
    $body .= "Nom : $nom\n";
    $body .= "Prénom : $prenom\n";
    $body .= "Email : $email\n";
    $body .= "Téléphone : $tel\n\n";
    $body .= "Message :\n$message";
    
    $headers = "From: contact@paradisdev.fr\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "✅ Email envoyé avec succès.<br>";
        echo "⏳ Redirection vers la page d'accueil dans 3 secondes...";
        echo '<script>setTimeout(function(){ window.location.href = "index.html"; }, 3000);</script>'; // Permets de rediriger sur la page d'où le "mail" a été envoyé
    } else {
        echo "❌ Échec de l'envoi de l'email.";
    }

} else {
    // Redirection si le formulaire n'a pas été soumis
    header("Location: index.html");
    exit;
}
?>
