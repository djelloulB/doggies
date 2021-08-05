<?php

namespace App\Entity;

use App\Repository\AdoptantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdoptantRepository::class)
 */
class Adoptant extends Utilisateur
{

    /**
     * @ORM\ManyToMany(targetEntity=DemandeAdoption::class, inversedBy="adoptants")
     */
    private $demandeAdoption;

    public function __construct()
    {
        $this->demandeAdoption = new ArrayCollection();
    }

    /**
     * @return Collection|DemandeAdoption[]
     */
    public function getDemandeAdoption(): Collection
    {
        return $this->demandeAdoption;
    }

    public function addDemandeAdoption(DemandeAdoption $demandeAdoption): self
    {
        if (!$this->demandeAdoption->contains($demandeAdoption)) {
            $this->demandeAdoption[] = $demandeAdoption;
        }

        return $this;
    }

    public function removeDemandeAdoption(DemandeAdoption $demandeAdoption): self
    {
        $this->demandeAdoption->removeElement($demandeAdoption);

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        //guarantee every utilisateur at least has ROLE_USER
        $roles[] = 'ROLE_ADOPTANT';

        return array_unique($roles);
    }
}
