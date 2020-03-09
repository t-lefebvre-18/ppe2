<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModedepaiementRepository")
 */
class Modedepaiement
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Abonement", mappedBy="abonement_id")
     */
    private $abonements;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\abonement", inversedBy="modedepaiements")
     */
    private $modedepaiement_id;

    public function __construct()
    {
        $this->abonements = new ArrayCollection();
        $this->modedepaiement_id = new ArrayCollection();
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

    /**
     * @return Collection|Abonement[]
     */
    public function getAbonements(): Collection
    {
        return $this->abonements;
    }

    public function addAbonement(Abonement $abonement): self
    {
        if (!$this->abonements->contains($abonement)) {
            $this->abonements[] = $abonement;
            $abonement->addAbonementId($this);
        }

        return $this;
    }

    public function removeAbonement(Abonement $abonement): self
    {
        if ($this->abonements->contains($abonement)) {
            $this->abonements->removeElement($abonement);
            $abonement->removeAbonementId($this);
        }

        return $this;
    }

    /**
     * @return Collection|abonement[]
     */
    public function getModedepaiementId(): Collection
    {
        return $this->modedepaiement_id;
    }

    public function addModedepaiementId(abonement $modedepaiementId): self
    {
        if (!$this->modedepaiement_id->contains($modedepaiementId)) {
            $this->modedepaiement_id[] = $modedepaiementId;
        }

        return $this;
    }

    public function removeModedepaiementId(abonement $modedepaiementId): self
    {
        if ($this->modedepaiement_id->contains($modedepaiementId)) {
            $this->modedepaiement_id->removeElement($modedepaiementId);
        }

        return $this;
    }
}
