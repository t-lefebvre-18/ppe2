<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="entreprise")
     */
    private $entreprise;

   

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * @return Collection|entreprise[]
     */
    public function getEntreprise(): Collection
    {
        return $this->entreprise;
    }

    public function addEntreprise(entreprise $entreprise): self
    {
        if (!$this->entreprise->contains($entreprise)) {
            $this->entreprise[] = $entreprise;
            $entreprise->setUtilisateur($this);
        }

        return $this;
    }

    public function removeEntreprise(entreprise $entreprise): self
    {
        if ($this->entreprise->contains($entreprise)) {
            $this->entreprise->removeElement($entreprise);
            // set the owning side to null (unless already changed)
            if ($entreprise->getUtilisateur() === $this) {
                $entreprise->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Entreprise[]
     */
    public function getEntreprises(): Collection
    {
        return $this->entreprises;
    }

    public function getUtilisateur(): ?Entreprise
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Entreprise $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }
}
