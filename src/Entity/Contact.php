<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     * 
     * @Assert\Length(
     * min = 1,)
     * 
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=128)
     * 
     * @Assert\Length(
     *      min = 1,)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\Email(
     * message = "email invalide."
     * )
     * 
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=128)
     * 
    * @Assert\Length(
     * min = 1,)
     * 
     */
    private $sujet;

    /**
     * @ORM\Column(type="text")
     * 
     * @Assert\Length(
     * min = 1,
     * max = 1500,)
     * 
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
