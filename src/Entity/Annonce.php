<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateMAJ;

    /**
     * @ORM\OneToMany(targetEntity=Dog::class, mappedBy="annonce")
     */
    private $dogs;

    /**
     * @ORM\OneToMany(targetEntity=DamandeAdoption::class, mappedBy="annonce")
     */
    private $damandeAdoptions;

    /**
     * @ORM\ManyToOne(targetEntity=Annonceur::class, inversedBy="annonces")
     */
    private $annonceur;

    public function __construct()
    {
        $this->dogs = new ArrayCollection();
        $this->damandeAdoptions = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateMAJ(): ?\DateTimeInterface
    {
        return $this->dateMAJ;
    }

    public function setDateMAJ(\DateTimeInterface $dateMAJ): self
    {
        $this->dateMAJ = $dateMAJ;

        return $this;
    }

    /**
     * @return Collection|Dog[]
     */
    public function getDogs(): Collection
    {
        return $this->dogs;
    }

    public function addDog(Dog $dog): self
    {
        if (!$this->dogs->contains($dog)) {
            $this->dogs[] = $dog;
            $dog->setAnnonce($this);
        }

        return $this;
    }

    public function removeDog(Dog $dog): self
    {
        if ($this->dogs->removeElement($dog)) {
            // set the owning side to null (unless already changed)
            if ($dog->getAnnonce() === $this) {
                $dog->setAnnonce(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DamandeAdoption[]
     */
    public function getDamandeAdoptions(): Collection
    {
        return $this->damandeAdoptions;
    }

    public function addDamandeAdoption(DamandeAdoption $damandeAdoption): self
    {
        if (!$this->damandeAdoptions->contains($damandeAdoption)) {
            $this->damandeAdoptions[] = $damandeAdoption;
            $damandeAdoption->setAnnonce($this);
        }

        return $this;
    }

    public function removeDamandeAdoption(DamandeAdoption $damandeAdoption): self
    {
        if ($this->damandeAdoptions->removeElement($damandeAdoption)) {
            // set the owning side to null (unless already changed)
            if ($damandeAdoption->getAnnonce() === $this) {
                $damandeAdoption->setAnnonce(null);
            }
        }

        return $this;
    }

    public function getAnnonceur(): ?Annonceur
    {
        return $this->annonceur;
    }

    public function setAnnonceur(?Annonceur $annonceur): self
    {
        $this->annonceur = $annonceur;

        return $this;
    }
}
