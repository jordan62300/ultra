<?php

namespace App\Entity;

use App\Repository\ChapitreLikesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChapitreLikesRepository::class)
 */
class ChapitreLikes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isLiked = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isShared = false;

    /**
     * @ORM\ManyToOne(targetEntity=Chapitres::class, inversedBy="chapitreLikes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chapitre;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="chapitreLikes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsLiked(): ?bool
    {
        return $this->isLiked;
    }

    public function setIsLiked(bool $isLiked): self
    {
        $this->isLiked = $isLiked;

        return $this;
    }

    public function getIsShared(): ?bool
    {
        return $this->isShared;
    }

    public function setIsShared(bool $isShared): self
    {
        $this->isShared = $isShared;

        return $this;
    }

    public function getChapitre(): ?Chapitres
    {
        return $this->chapitre;
    }

    public function setChapitre(?Chapitres $chapitre): self
    {
        $this->chapitre = $chapitre;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }
}
