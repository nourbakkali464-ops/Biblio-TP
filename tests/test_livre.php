<?php

$livre = new Livre('9782100545261', 'Algo', 'Cormen');

verifier($livre->getIsbn() === '9782100545261', 'ISBN correct');
verifier($livre->getTitre() === 'Algo', 'Titre correct');
verifier($livre->getAuteur() === 'Cormen', 'Auteur correct');
verifier($livre->estDisponible(), 'Un nouveau livre est disponible');

$livreCourt = new Livre('1234567890', 'PHP', 'Auteur');

verifier(
    $livreCourt->getIsbn() === '1234567890',
    'Un ISBN de 10 chiffres est accepté'
);

foreach (['123', '123456789A', '12345678901234'] as $isbnInvalide) {
    $exceptionLevee = false;

    try {
        new Livre($isbnInvalide, 'Test', 'Auteur');
    } catch (InvalidArgumentException $e) {
        $exceptionLevee = true;
    }

    verifier($exceptionLevee, "ISBN invalide refusé : $isbnInvalide");
}