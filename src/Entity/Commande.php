<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Livre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isLivre(): ?bool
    {
        return $this->Livre;
    }

    public function setLivre(?bool $Livre): static
    {
        $this->Livre = $Livre;

        return $this;
    }
}
