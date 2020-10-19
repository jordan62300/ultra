<?php

namespace App\Entity;

use App\Repository\ChapitresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ChapitresRepository::class)
 * @Vich\Uploadable
 */
class Chapitres
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
    private $statut;

    /**
     * @var string||null
     * @ORM\Column(type="string", length=255)
     */
    private $fileName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="chapitre_image", fileNameProperty="fileName")
     * 
     * @var File|null
     */
    private $imageFile;



    /**
     * @ORM\OneToMany(targetEntity=Pages::class, mappedBy="chapitre")
     */
    private $pages;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $likeNumber = 0;

    /**
     * @ORM\OneToMany(targetEntity=ChapitreLikes::class, mappedBy="chapitre")
     */
    private $chapitreLikes;

    /**
     * @ORM\OneToMany(targetEntity=CommentaireChapitres::class, mappedBy="chapitre")
     */
    private $commentaireChapitres;

    /**
     * @ORM\ManyToOne(targetEntity=Arcs::class, inversedBy="chapitres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $arc;

    /**
     * @ORM\Column(type="integer")
     */
    private $shareNumber;

    public function __construct()
    {
        $this->pages = new ArrayCollection();
        $this->chapitreLikes = new ArrayCollection();
        $this->commentaireChapitres = new ArrayCollection();
    }

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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated_at = new \DateTimeImmutable();
        }
    }

    

    /**
     * @return Collection|Pages[]
     */
    public function getPages(): Collection
    {
        return $this->pages;
    }

    public function addPage(Pages $page): self
    {
        if (!$this->pages->contains($page)) {
            $this->pages[] = $page;
            $page->setChapitre($this);
        }

        return $this;
    }

    public function removePage(Pages $page): self
    {
        if ($this->pages->contains($page)) {
            $this->pages->removeElement($page);
            // set the owning side to null (unless already changed)
            if ($page->getChapitre() === $this) {
                $page->setChapitre(null);
            }
        }

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
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

    /**
     * @return Collection|ChapitreLikes[]
     */
    public function getChapitreLikes(): Collection
    {
        return $this->chapitreLikes;
    }

    public function addChapitreLike(ChapitreLikes $chapitreLike): self
    {
        if (!$this->chapitreLikes->contains($chapitreLike)) {
            $this->chapitreLikes[] = $chapitreLike;
            $chapitreLike->setChapitre($this);
        }

        return $this;
    }

    public function removeChapitreLike(ChapitreLikes $chapitreLike): self
    {
        if ($this->chapitreLikes->contains($chapitreLike)) {
            $this->chapitreLikes->removeElement($chapitreLike);
            // set the owning side to null (unless already changed)
            if ($chapitreLike->getChapitre() === $this) {
                $chapitreLike->setChapitre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CommentaireChapitres[]
     */
    public function getCommentaireChapitres(): Collection
    {
        return $this->commentaireChapitres;
    }

    public function addCommentaireChapitre(CommentaireChapitres $commentaireChapitre): self
    {
        if (!$this->commentaireChapitres->contains($commentaireChapitre)) {
            $this->commentaireChapitres[] = $commentaireChapitre;
            $commentaireChapitre->setChapitre($this);
        }

        return $this;
    }

    public function removeCommentaireChapitre(CommentaireChapitres $commentaireChapitre): self
    {
        if ($this->commentaireChapitres->contains($commentaireChapitre)) {
            $this->commentaireChapitres->removeElement($commentaireChapitre);
            // set the owning side to null (unless already changed)
            if ($commentaireChapitre->getChapitre() === $this) {
                $commentaireChapitre->setChapitre(null);
            }
        }

        return $this;
    }

    public function getArc(): ?Arcs
    {
        return $this->arc;
    }

    public function setArc(?Arcs $arc): self
    {
        $this->arc = $arc;

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
