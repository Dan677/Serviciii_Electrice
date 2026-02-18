<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preluăm datele din formular
    $serviciu = strip_tags(trim($_POST["serviciu"]));
    $adresa = strip_tags(trim($_POST["adresa"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $telefon = strip_tags(trim($_POST["telefon"]));
    $mesaj = strip_tags(trim($_POST["mesaj"]));

    // Destinatarul (adresa ta)
    $to = "muresan.cristian19@yahoo.com";
    $subject = "Cerere de oferta: $serviciu";

    // Construim conținutul email-ului
    $email_content = "Ai primit o cerere nouă de la: $adresa\n\n";
    $email_content .= "Serviciu solicitat: $serviciu\n";
    $email_content .= "Email client: $email\n";
    $email_content .= "Telefon: $telefon\n\n";
    $email_content .= "Mesaj:\n$mesaj\n";

    // Header-e pentru trimitere corectă
    $headers = "From: contact@numesiteteu.ro\r\n"; // Trebuie sa fie o adresa de pe domeniul tau
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Trimitem email-ul
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirecționare către o pagină de mulțumire sau mesaj succes
        echo "Mesajul a fost trimis! Vă mulțumim.";
    } else {
        echo "Eroare la trimitere. Vă rugăm să încercați mai târziu.";
    }
} else {
    echo "Acces neautorizat.";
}
?>