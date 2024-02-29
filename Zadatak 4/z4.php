<?php

$user = isset($_GET['user']) ? $_GET['user'] : '620';

$url = "https://api.adriatic.hr/test/it?user=" . $user;

$response = file_get_contents($url);

if ($response !== false) {
    
    $password = $response;

    $urlWithPassword = "https://api.adriatic.hr/test/it?user=" . $user . "&pass=" . $password;

    $taskResponse = file_get_contents($urlWithPassword);

    if ($taskResponse !== false) {

        echo "Zadatak: " . $taskResponse;
    } else {
        echo "Greška pri dohvatu zadatka.";
    }
} else {
    echo "Greška pri dohvatu user-a.";
}

?>