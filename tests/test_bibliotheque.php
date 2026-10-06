<?php
$b = new Bibliotheque();
verifier($b->compter() === 0, 'Bibliothèque vide au départ');

$b->ajouter(new Livre('9782100545261', 'Algo', 'Cormen'));
$b->ajouter(new Livre('9780132350884', 'Clean Code', 'Martin'));
verifier($b->compter() === 2, 'Deux livres après ajout');
verifier($b->trouver('9782100545261') !== null, 'Livre trouvé par ISBN');
verifier($b->trouver('0000000000') === null, 'ISBN inconnu retourne null');
verifier(count($b->tous()) === 2, 'tous() retourne 2 livres');
verifier(count($b->rechercher('cormen')) === 1, 'Recherche par auteur, casse ignorée');
verifier(count($b->rechercher('CLEAN')) === 1, 'Recherche par titre, casse ignorée');

try {
    $b->ajouter(new Livre('9782100545261', 'Doublon', 'X'));
    verifier(false, 'ISBN en double refusé');
} catch (Exception $e) {
    verifier(true, 'ISBN en double refusé');
}