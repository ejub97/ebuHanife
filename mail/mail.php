<?php
// Dohvati podatke iz POST zahtjeva i sanitiziraj ih
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$phone = htmlspecialchars(trim($_POST['phone']));
$subject = htmlspecialchars(trim($_POST['subject']));
$message = htmlspecialchars(trim($_POST['message']));

// Sastavi sadržaj poruke
$email_message = "
Name: $name\n
Email: $email\n
Phone: $phone\n
Subject: $subject\n
Message: $message\n
";

// Definiraj e-mail primatelja
$to = "school.ebuhanife@gmail.com"; 
$email_subject = "Nova poruka sa kontakt forme";


$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Pošalji e-mail
if (mail($to, $email_subject, $email_message, $headers)) {
    // Ako je uspješno poslan, preusmjeri na uspjeh stranicu
    header("Location: ../mail-success.html");
    exit();
} else {
    // Ako nije uspjelo, prikaži poruku o grešci
    echo "Greška prilikom slanja poruke. Pokušajte ponovo.";
}
?>
