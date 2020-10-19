<?php

namespace App\Entity;

use App\Repository\CommentaireChapitresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireChapitresRepository::class)
 */
class CommentaireChapitres
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
    private $commentaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $likeNumber = 0;

    /**
     * @ORM\Column(name="created_at",type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=Chapitres::class, inversedBy="commentaireChapitres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chapitre;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="commentaireChapitres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=UserCommentaireChapitres::class, mappedBy="commentaire")
     */
    private $userCommentaireChapitres;

    /**
     * @ORM\Column(type="integer")
     */
    private $shareNumber;

    public function __construct()
    {
        $this->userCommentaireChapitres = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getLikeNumber(): ?int
    {
        return $this->likeNumber;
    }

    public function setLikeNumber(int $likeNumber): self
    {
        $this->likeNumber = $likeNumber;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

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

    /**
     * @return Collection|UserCommentaireChapitres[]
     */
    public function getUserCommentaireChapitres(): Collection
    {
        return $this->userCommentaireChapitres;
    }

    public function addUserCommentaireChapitre(UserCommentaireChapitres $userCommentaireChapitre): self
    {
        if (!$this->userCommentaireChapitres->contains($userCommentaireChapitre)) {
            $this->userCommentaireChapitres[] = $userCommentaireChapitre;
            $userCommentaireChapitre->setCommentaire($this);
        }

        return $this;
    }

    public function removeUserCommentaireChapitre(UserCommentaireChapitres $userCommentaireChapitre): self
    {
        if ($this->userCommentaireChapitres->contains($userCommentaireChapitre)) {
            $this->userCommentaireChapitres->removeElement($userCommentaireChapitre);
            // set the owning side to null (unless already changed)
            if ($userCommentaireChapitre->getCommentaire() === $this) {
                $userCommentaireChapitre->setCommentaire(null);
            }
        }

        return $this;
    }

    public function getShareNumber(): ?int
    {
        return $this->shareNumber;
    }

    public function setShareNumber(int $shareNumber): self
    {
        $this->shareNumber = $shareNumber;

        return $this;
    }
}
