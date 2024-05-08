submit_form.php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = strip_tags(trim($_POST["nom"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $missatge = strip_tags(trim($_POST["missatge"]));

    // Aquesta és la teva adreça de correu electrònic a la qual vols rebre els missatges
    $to = 'mvilar78@gmail.com'; 
    $subject = "Nou Missatge de Contacte de $nom";
    $content = "Has rebut un nou missatge de contacte.\n\n".
               "Nom: $nom\n".
               "Email: $email\n\n".
               "Missatge:\n$missatge";

    // Les capçaleres per correu electrònic
    $headers = "From: $nom <$email>";

    // Enviar el correu electrònic
    mail($to, $subject, $content, $headers);

    // Redirigir a una pàgina de gràcies o de tornada al lloc web
    header("Location: thank_you.html");
} else {
    // No és una petició POST, redirigir a la pàgina principal o mostrar error
    header("Location: error.html");
    exit;
}
?>
