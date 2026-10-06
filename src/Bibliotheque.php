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
}