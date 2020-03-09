<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReponseRepository")
 */
class Reponse
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
    private $libelle_reponse;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Question", inversedBy="question_id")
     */
    private $question;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleReponse(): ?string
    {
        return $this->libelle_reponse;
    }

    public function setLibelleReponse(string $libelle_reponse): self
    {
        $this->libelle_reponse = $libelle_reponse;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }
}
