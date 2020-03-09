<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TraductionRepository")
 */
class Traduction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\vocabulaire", mappedBy="traduction")
     */
    private $traduction;

    public function __construct()
    {
        $this->traduction = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|vocabulaire[]
     */
    public function getTraduction(): Collection
    {
        return $this->traduction;
    }

    public function addTraduction(vocabulaire $traduction): self
    {
        if (!$this->traduction->contains($traduction)) {
            $this->traduction[] = $traduction;
            $traduction->setTraduction($this);
        }

        return $this;
    }

    public function removeTraduction(vocabulaire $traduction): self
    {
        if ($this->traduction->contains($traduction)) {
            $this->traduction->removeElement($traduction);
            // set the owning side to null (unless already changed)
            if ($traduction->getTraduction() === $this) {
                $traduction->setTraduction(null);
            }
        }

        return $this;
    }
}
