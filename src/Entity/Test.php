<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 */
class Test
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
    private $niveaux;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Theme", inversedBy="theme")
     */
    private $theme;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\test", mappedBy="resultat")
     */
    private $test;

   

    public function __construct()
    {
        $this->theme = new ArrayCollection();
        $this->test = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveaux(): ?string
    {
        return $this->niveaux;
    }

    public function setNiveaux(string $niveaux): self
    {
        $this->niveaux = $niveaux;

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

    /**
     * @return Collection|resultat[]
     */
    public function getTest(): Collection
    {
        return $this->test;
    }

    public function addTest(resultat $test): self
    {
        if (!$this->test->contains($test)) {
            $this->test[] = $test;
            $test->setTest($this);
        }

        return $this;
    }

    public function removeTest(resultat $test): self
    {
        if ($this->test->contains($test)) {
            $this->test->removeElement($test);
            // set the owning side to null (unless already changed)
            if ($test->getTest() === $this) {
                $test->setTest(null);
            }
        }

        return $this;
    }

    
}
