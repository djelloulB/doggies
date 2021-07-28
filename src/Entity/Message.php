<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $longueur;

    /**
     * @ORM\ManyToOne(targetEntity=DamandeAdoption::class, inversedBy="messages")
     */
    private $demandeAdoption;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    public function setLongueur(float $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getDemandeAdoption(): ?DamandeAdoption
    {
        return $this->demandeAdoption;
    }

    public function setDemandeAdoption(?DamandeAdoption $demandeAdoption): self
    {
        $this->demandeAdoption = $demandeAdoption;

        return $this;
    }
}
