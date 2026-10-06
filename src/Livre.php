<?php

class Livre
{
    private string $isbn;
    private string $titre;
    private string $auteur;
    private bool $disponible = true;

    public function __construct(string $isbn, string $titre, string $auteur)
    {
        if (preg_match('/^(?:[0-9]{10}|[0-9]{13})$/', $isbn) !== 1) {
            throw new InvalidArgumentException(
                'L’ISBN doit contenir exactement 10 ou 13 chiffres.'
            );
        }

        $this->isbn = $isbn;
        $this->titre = $titre;
        $this->auteur = $auteur;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function estDisponible(): bool
    {
        return $this->disponible;
    }
        public function emprunter(): void
    {
        if (!$this->disponible) {
            throw new Exception('Ce livre est déjà emprunté.');
        }

        $this->disponible = false;
    }
}