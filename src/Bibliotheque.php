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
}