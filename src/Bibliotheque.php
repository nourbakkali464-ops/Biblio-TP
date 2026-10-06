<?php
class Bibliotheque
{
    /** @var Livre[] */
    private array $livres = [];

    public function ajouter(Livre $l): void
    {
        if (isset($this->livres[$l->getIsbn()])) {
            throw new Exception("ISBN déjà présent : " . $l->getIsbn());
        }
        $this->livres[$l->getIsbn()] = $l;
    }
    public function compter(): int
    {
        return count($this->livres);
    }
    public function trouver(string $isbn): ?Livre
    {
        return $this->livres[$isbn] ?? null;
    }
    
    public function tous(): array
    {
        return array_values($this->livres);
    }
    public function rechercher(string $mot): array
    {
        $k = mb_strtolower($mot);
        return array_values(array_filter($this->livres, fn(Livre $l) =>
            str_contains(mb_strtolower($l->getTitre()), $k) ||
            str_contains(mb_strtolower($l->getAuteur()), $k)
        ));
    }
}