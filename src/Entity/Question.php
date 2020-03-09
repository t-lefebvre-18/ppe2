<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
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
    private $libelle_question;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reponse", mappedBy="question")
     */
    private $question_id;

    public function __construct()
    {
        $this->question_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleQuestion(): ?string
    {
        return $this->libelle_question;
    }

    public function setLibelleQuestion(string $libelle_question): self
    {
        $this->libelle_question = $libelle_question;

        return $this;
    }

    /**
     * @return Collection|reponse[]
     */
    public function getQuestionId(): Collection
    {
        return $this->question_id;
    }

    public function addQuestionId(reponse $questionId): self
    {
        if (!$this->question_id->contains($questionId)) {
            $this->question_id[] = $questionId;
            $questionId->setQuestion($this);
        }

        return $this;
    }

    public function removeQuestionId(reponse $questionId): self
    {
        if ($this->question_id->contains($questionId)) {
            $this->question_id->removeElement($questionId);
            // set the owning side to null (unless already changed)
            if ($questionId->getQuestion() === $this) {
                $questionId->setQuestion(null);
            }
        }

        return $this;
    }
}
