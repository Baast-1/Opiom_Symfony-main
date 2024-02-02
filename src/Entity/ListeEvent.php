<?php

namespace App\Entity;

use App\Entity\Bateau;
use App\Repository\ListeEventRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ListeEventRepository::class)]
class ListeEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Bateau::class)]
    private $bateau;

    #[ORM\Column]
    private ?string $titre;

    #[ORM\Column]
    private ?string $nom;

    #[ORM\Column]
    private ?string $prenom;

    #[ORM\Column]
    private ?string $telephone;

    #[ORM\Column]
    private ?string $nomEntreprise;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateHeureDebut;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateHeureFin;

    #[ORM\Column]
    private ?int $capacite;

    #[ORM\Column(type: 'string', options: ['default' => 'Validé'])]
    private ?string $etat = 'Validé';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBateau(): ?Bateau
    {
        return $this->bateau;
    }

    public function setBateau(?Bateau $bateau): void
    {
        $this->bateau = $bateau;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): void
    {
        $this->titre = $titre;
    }
    

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }
    

    
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(?string $nomEntreprise): void
    {
        $this->nomEntreprise = $nomEntreprise;
    }

    public function getDateHeureDebut(): ?\DateTimeInterface
    {
        return $this->dateHeureDebut;
    }

    public function setDateHeureDebut(?\DateTimeInterface $dateHeureDebut): void
    {
        $this->dateHeureDebut = $dateHeureDebut;
    }

    public function getDateHeureFin(): ?\DateTimeInterface
    {
        return $this->dateHeureFin;
    }

    public function setDateHeureFin(?\DateTimeInterface $dateHeureFin): void
    {
        $this->dateHeureFin = $dateHeureFin;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(?int $capacite): void
    {
        $this->capacite = $capacite;
    }

    public function setEtat(?string $etat): void
    {
    $this->etat = $etat;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }
}