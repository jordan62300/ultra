<?php

namespace App\Entity;

use App\Repository\UserCommentaireChapitresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserCommentaireChapitresRepository::class)
 */
class UserCommentaireChapitres
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
     * @ORM\ManyToOne(targetEntity=CommentaireChapitres::class, inversedBy="userCommentaireChapitres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="userCommentaireChapitres")
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

    public function getCommentaire(): ?CommentaireChapitres
    {
        return $this->commentaire;
    }

    public function setCommentaire(?CommentaireChapitres $commentaire): self
    {
        $this->commentaire = $commentaire;

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
