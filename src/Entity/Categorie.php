<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $designation;

    /**
     * @ORM\OneToMany(targetEntity=Annonceur::class, mappedBy="categorie")
     */
    private $annonceurs;

    public function __construct()
    {
        $this->annonceurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * @return Collection|Annonceur[]
     */
    public function getAnnonceurs(): Collection
    {
        return $this->annonceurs;
    }

    public function addAnnonceur(Annonceur $annonceur): self
    {
        if (!$this->annonceurs->contains($annonceur)) {
            $this->annonceurs[] = $annonceur;
            $annonceur->setCategorie($this);
        }

        return $this;
    }

    public function removeAnnonceur(Annonceur $annonceur): self
    {
        if ($this->annonceurs->removeElement($annonceur)) {
            // set the owning side to null (unless already changed)
            if ($annonceur->getCategorie() === $this) {
                $annonceur->setCategorie(null);
            }
        }

        return $this;
    }
}
