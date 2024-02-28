<?php

// Postavljanje user parametra na 620 ako nije dostupan u URL-u
$user = isset($_GET['user']) ? $_GET['user'] : '620';

// Kreiranje URL-a za dohvat password-a
$url = "https://api.adriatic.hr/test/it?user=" . $user;

// Slanje GET zahtjeva za dohvat password-a
$response = file_get_contents($url);

// Provjera je li zahtjev uspješan
if ($response !== false) {
    // Koristimo dobiveni odgovor kao password
    $password = $response;

    // Drugi korak: Korištenje password-a za dohvat zadatka
    $urlWithPassword = "https://api.adriatic.hr/test/it?user=" . $user . "&pass=" . $password;

    // Slanje GET zahtjeva za dohvat zadatka
    $taskResponse = file_get_contents($urlWithPassword);

    // Provjera je li zahtjev uspješan
    if ($taskResponse !== false) {
        // Ovdje možete obraditi odgovor za dohvaćeni zadatak
        echo "Zadatak: " . $taskResponse;
    } else {
        echo "Greška pri dohvatu zadatka.";
    }
} else {
    echo "Greška pri dohvatu user-a.";
}

?>
