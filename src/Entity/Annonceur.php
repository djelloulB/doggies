<?php

namespace App\Entity;

use App\Repository\AnnonceurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceurRepository::class)
 */
class Annonceur extends Utilisateur
{
    /**
     *
    * @ORM\Column(type="string", length=255, nullable=true)
    */
    protected $image;
    /**
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="annonceur")
     */
    private $annonces;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="annonceurs")
     */
    private $categorie;

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
    }

    /**
     * @return Collection|Annonce[]
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setAnnonceur($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getAnnonceur() === $this) {
                $annonce->setAnnonceur(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        //guarantee every utilisateur at least has ROLE_USER
        $roles[] = 'ROLE_ANNONCEUR';

        return array_unique($roles);
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
