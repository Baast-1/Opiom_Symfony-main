<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BateauRepository::class)]
class Bateau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $nom;

    #[ORM\Column]
    private ?int $capacite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }
    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(?int $capacite): void
    {
        $this->capacite = $capacite;
    }
}
