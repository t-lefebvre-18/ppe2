<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VocabulaireRepository")
 */
class Vocabulaire
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Theme", mappedBy="themeassociation")
     */
    private $themes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Theme", inversedBy="themepopo")
     */
    private $theme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Traduction", inversedBy="traduction")
     */
    private $traduction;

    public function __construct()
    {
        $this->vocabulaire = new ArrayCollection();
        $this->themes = new ArrayCollection();
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
     * @return Collection|traduction[]
     */
    public function getVocabulaire(): Collection
    {
        return $this->vocabulaire;
    }

    public function addVocabulaire(traduction $vocabulaire): self
    {
        if (!$this->vocabulaire->contains($vocabulaire)) {
            $this->vocabulaire[] = $vocabulaire;
            $vocabulaire->setVocabulaire($this);
        }

        return $this;
    }

    public function removeVocabulaire(traduction $vocabulaire): self
    {
        if ($this->vocabulaire->contains($vocabulaire)) {
            $this->vocabulaire->removeElement($vocabulaire);
            // set the owning side to null (unless already changed)
            if ($vocabulaire->getVocabulaire() === $this) {
                $vocabulaire->setVocabulaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Theme[]
     */
    public function getThemes(): Collection
    {
        return $this->themes;
    }

    public function addTheme(Theme $theme): self
    {
        if (!$this->themes->contains($theme)) {
            $this->themes[] = $theme;
            $theme->addThemeassociation($this);
        }

        return $this;
    }

    public function removeTheme(Theme $theme): self
    {
        if ($this->themes->contains($theme)) {
            $this->themes->removeElement($theme);
            $theme->removeThemeassociation($this);
        }

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getTraduction(): ?Traduction
    {
        return $this->traduction;
    }

    public function setTraduction(?Traduction $traduction): self
    {
        $this->traduction = $traduction;

        return $this;
    }
}
