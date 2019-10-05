<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="VocabularyRepository")
 */
class Vocabulary
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $word;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $translate;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $transcription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $example;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getWord(): ?string
    {
        return $this->word;
    }

    /**
     * @param string $word
     * @return Vocabulary
     */
    public function setWord(string $word): self
    {
        $this->word = $word;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTranslate(): ?string
    {
        return $this->translate;
    }

    /**
     * @param string $translate
     * @return Vocabulary
     */
    public function setTranslate(string $translate): self
    {
        $this->translate = $translate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTranscription(): ?string
    {
        return $this->transcription;
    }

    /**
     * @param string $transcription
     * @return Vocabulary
     */
    public function setTranscription(string $transcription): self
    {
        $this->transcription = $transcription;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getExample(): ?string
    {
        return $this->example;
    }

    /**
     * @param null|string $example
     * @return Vocabulary
     */
    public function setExample(?string $example): self
    {
        $this->example = $example;

        return $this;
    }
}
