<?php

namespace App\Entity;

use App\Repository\DemandeAdoptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandeAdoptionRepository::class)
 */
class DemandeAdoption
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Annonce::class, inversedBy="demandeAdoptions")
     */
    private $annonce;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $sujet;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="demandeAdoption",cascade={"persist"})
     */
    private $messages;

    /**
     * @ORM\ManyToMany(targetEntity=Adoptant::class, mappedBy="demandeAdoption")
     */
    private $adoptants;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
        $this->adoptants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setDemandeAdoption($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getDemandeAdoption() === $this) {
                $message->setDemandeAdoption(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Adoptant[]
     */
    public function getAdoptants(): Collection
    {
        return $this->adoptants;
    }

    public function addAdoptant(Adoptant $adoptant): self
    {
        if (!$this->adoptants->contains($adoptant)) {
            $this->adoptants[] = $adoptant;
            $adoptant->addDemandeAdoption($this);
        }

        return $this;
    }

    public function removeAdoptant(Adoptant $adoptant): self
    {
        if ($this->adoptants->removeElement($adoptant)) {
            $adoptant->removeDemandeAdoption($this);
        }

        return $this;
    }

    /**
     * Get the value of sujet
     */ 
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set the value of sujet
     *
     * @return  self
     */ 
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }
}
