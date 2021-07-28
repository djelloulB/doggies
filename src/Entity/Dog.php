<?php

namespace App\Entity;

use App\Repository\DogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DogRepository::class)
 */
class Dog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estAdopte;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estTolerant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $antecedents;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ifLof;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Breed::class, inversedBy="dogs")
     */
    private $Breeds;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="dog")
     */
    private $images;

    /**
     * @ORM\ManyToOne(targetEntity=Annonce::class, inversedBy="dogs")
     */
    private $annonce;

    public function __construct()
    {
        $this->Breeds = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstAdopte(): ?bool
    {
        return $this->estAdopte;
    }

    public function setEstAdopte(bool $estAdopte): self
    {
        $this->estAdopte = $estAdopte;

        return $this;
    }

    public function getEstTolerant(): ?bool
    {
        return $this->estTolerant;
    }

    public function setEstTolerant(bool $estTolerant): self
    {
        $this->estTolerant = $estTolerant;

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

    public function getAntecedents(): ?string
    {
        return $this->antecedents;
    }

    public function setAntecedents(?string $antecedents): self
    {
        $this->antecedents = $antecedents;

        return $this;
    }

    public function getIfLof(): ?bool
    {
        return $this->ifLof;
    }

    public function setIfLof(bool $ifLof): self
    {
        $this->ifLof = $ifLof;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Breed[]
     */
    public function getBreeds(): Collection
    {
        return $this->Breeds;
    }

    public function addBreed(Breed $Breed): self
    {
        if (!$this->Breeds->contains($Breed)) {
            $this->Breeds[] = $Breed;
        }

        return $this;
    }

    public function removeBreed(Breed $Breed): self
    {
        $this->Breeds->removeElement($Breed);

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setDog($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getDog() === $this) {
                $image->setDog(null);
            }
        }

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }
}
