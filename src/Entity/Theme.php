<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThemeRepository")
 */
class Theme
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
     * @ORM\OneToMany(targetEntity="App\Entity\theme", mappedBy="test")
     */
    private $theme;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;

   

  

    public function __construct()
    {
        $this->theme = new ArrayCollection();
        $this->themeassociation = new ArrayCollection();
        $this->themepopo = new ArrayCollection();
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
     * @return Collection|test[]
     */
    public function getTheme(): Collection
    {
        return $this->theme;
    }

    public function addTheme(test $theme): self
    {
        if (!$this->theme->contains($theme)) {
            $this->theme[] = $theme;
            $theme->setTheme($this);
        }

        return $this;
    }

    public function removeTheme(test $theme): self
    {
        if ($this->theme->contains($theme)) {
            $this->theme->removeElement($theme);
            // set the owning side to null (unless already changed)
            if ($theme->getTheme() === $this) {
                $theme->setTheme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|vocabulaire[]
     */
    public function getThemeassociation(): Collection
    {
        return $this->themeassociation;
    }

    public function addThemeassociation(vocabulaire $themeassociation): self
    {
        if (!$this->themeassociation->contains($themeassociation)) {
            $this->themeassociation[] = $themeassociation;
        }

        return $this;
    }

    public function removeThemeassociation(vocabulaire $themeassociation): self
    {
        if ($this->themeassociation->contains($themeassociation)) {
            $this->themeassociation->removeElement($themeassociation);
        }

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|vocabulaire[]
     */
    public function getThemepopo(): Collection
    {
        return $this->themepopo;
    }

    public function addThemepopo(vocabulaire $themepopo): self
    {
        if (!$this->themepopo->contains($themepopo)) {
            $this->themepopo[] = $themepopo;
            $themepopo->setTheme($this);
        }

        return $this;
    }

    public function removeThemepopo(vocabulaire $themepopo): self
    {
        if ($this->themepopo->contains($themepopo)) {
            $this->themepopo->removeElement($themepopo);
            // set the owning side to null (unless already changed)
            if ($themepopo->getTheme() === $this) {
                $themepopo->setTheme(null);
            }
        }

        return $this;
    }

   
}
