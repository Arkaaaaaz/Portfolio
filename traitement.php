<?php

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Récupère les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $message = $_POST['message'];

// Valide les données (exemple simple)
if (empty($nom) || empty ($mail) || empty ($message)) {
    die("Tous ces champs sont obligatoires.");
}

// Nettoie les données
$nom = htmlspecialchars($nom);
$prenom = htmlspecialchars($prenom);
$email = htmlspecialchars($email);
$tel = htmlspecialchars($tel);
$message = htmlspecialchars($message);

// Affiche les données (vous pouvez les enregistrer dans une base de données ou envoyer un email)
echo "<b>Récapitulatif du message envoyé : </b><br>";
echo "Nom: " . $nom . "<br>";
echo "Prénom: " . $prenom . "<br>";
echo "Téléphone: " . $tel . "<br>";
echo "Email: " . $email . "<br>";
echo "Message: " .$message . "<br>";

// Exemple d'envoi d'email
$to = "contact@paradisdev.fr";
$subject = "Nouveau Message de $nom";
$body = "Vous avez reçu un nouveau message de $nom.\n\nPrénom: $prenom\n\nEmail: $email\n\nTéléphone: $tel\n\nMessage:\n$message";
$headers = "From: $email"

if (mail($to, $subject, $body, $headers))
        {
    echo "Email envoyé avec succès";
        } else {
    echo "Échec de l'envoi de l'email.";        
        }

} else {
// Si le formulaire n'a pas été soumis, redirige vers le formulaire
    header("Location:index.html");
}

?>