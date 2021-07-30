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
     * @ORM\ManyToOne(targetEntity=DamandeAdoption::class, inversedBy="messages")
     */
    private $demandeAdoption;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
