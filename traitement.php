<?php
require __DIR__ . '/vendor/autoload.php'; // charge l'autoload de composer

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
// Pour vérifier si le formulaire a été soumis avec la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {   

    // Récupère le token reCAPTCHA envoyé par le formulaire
    $recaptchaToken = $_POST['g-token'] ?? '';

    // Vérifie que le token reCAPTCHA n'est pas vide
    if (empty($recaptchaToken)) {
        die("Échec reCAPTCHA : Token manquant."); //Arrête le script si le token est absent
    }

    // Clé secrète reCAPTCHA envoyé par le formulaire
    $cle_secrete = $_ENV['RECAPTCHA_SECRET'];
    

    // URL de vérification reCAPTCHA côté serveur
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';


    // Initialise une session cURL pour envoyer la requête POST à Google
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $recaptcha_url);  // Définit l'url de la requête
    curl_setopt($ch, CURLOPT_POST, 1);  // Indique que c'est une requête POST
    // Envoie les données : clé secrète et token reCAPTCHA
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $cle_secrete, 'response' => $recaptchaToken)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Récupère la réponse sous forme de chaîne
    $capcharespo = curl_exec($ch);  // Exécute la requête
    curl_close($ch); // Ferme la session cURL

    // Décode la réponse JSON en tableau associatif
    $Reponse = json_decode($capcharespo, true);

    // Vérifie si la validation reCAPTCHA a réussi et si le score est suffisant
    if (!$Reponse['success'] || $Reponse['score'] < 0.5) { // La valeur numérique = score à atteindre pour valider le formulaire
        die("Échec reCAPTCHA : activité suspecte détectée."); // BLoque si suspicion de bot
    }

    // Récupère les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $message = $_POST["message"];

    // Vérifie que les champs obligatoires ne sont pas vides
    if (empty($nom) || empty($prenom) || empty($email) || empty($message)) {
        die("Tous ces champs sont obligatoires.");
    }

    // Prépare le mail à envoyer
    $to = "contact@paradisdev.fr";  // Destinataire
    $subject = "Nouveau Message de $prenom $nom";   // Sujet 

    // Corps du message /Ligne
    $body = "Vous avez reçu un nouveau message depuis le site paradisdev.fr.\n\n";
    $body .= "Nom : $nom\n";
    $body .= "Prénom : $prenom\n";
    $body .= "Email : $email\n";
    $body .= "Téléphone : $tel\n\n";
    $body .= "Message :\n$message";

    // Entêtes du mail (expéditeur/réponse et type de contenu)
    $headers = "From: contact@paradisdev.fr\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8";


    // Envoi du mail et redirection selon succès ou échec
    if (mail($to, $subject, $body, $headers)) {
        header("Location:index.php?msg=Message bien envoyé#section-contact");
    } else {
        header("Location:index.php?msg=Échec de l'envoi du message#section-contact");
    }

} else {
    // Si la requête n'est pas POST, redirige avec message d'erreur
    header("Location:index.php?msg=Méthode d'envoi non autorisée#section-contact");
    exit;
}
?>
