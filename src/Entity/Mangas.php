<?php

namespace App\Entity;

use App\Repository\MangasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=MangasRepository::class)
 * @Vich\Uploadable
 */
class Mangas
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var string||null
     * @ORM\Column(type="string", length=255)
     */
    private $fileName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="manga_image", fileNameProperty="fileName")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @var string||null
     * @ORM\Column(type="string", length=255)
     */
    private $fileNameVitrineUne;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="manga_image_vitrine_une", fileNameProperty="fileNameVitrineUne")
     * 
     * @var File|null
     */
    private $imageFileVitrineUne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\Column(type="integer")
     */
    private $soutien;

    /**
     * @ORM\Column(type="boolean")
     */
    private $partenaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $grade;


    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="mangas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=Arcs::class, mappedBy="manga")
     */
    private $arcs;

    

    public function __construct()
    {
        $this->arcs = new ArrayCollection();
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

    public function getFileNameVitrineUne(): ?string
    {
        return $this->fileNameVitrineUne;
    }

    public function setFileNameVitrineUne(string $fileNameVitrineUne): self
    {
        $this->fileNameVitrineUne = $fileNameVitrineUne;

        return $this;
    }

    public function getImageFileVitrineUne(): ?File
    {
        return $this->imageFileVitrineUne;
    }

    public function setImageFileVitrineUne(?File $imageFileVitrineUne = null): void
    {
        $this->imageFileVitrineUne = $imageFileVitrineUne;

        if (null !== $imageFileVitrineUne) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated_at = new \DateTimeImmutable();
        }
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

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

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

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getSoutien(): ?int
    {
        return $this->soutien;
    }

    public function setSoutien(int $soutien): self
    {
        $this->soutien = $soutien;

        return $this;
    }

    public function getPartenaire(): ?bool
    {
        return $this->partenaire;
    }

    public function setPartenaire(bool $partenaire): self
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): self
    {
        $this->grade = $grade;

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


    /**
     * @return Collection|Arcs[]
     */
    public function getArcs(): Collection
    {
        return $this->arcs;
    }

    public function addArc(Arcs $arc): self
    {
        if (!$this->arcs->contains($arc)) {
            $this->arcs[] = $arc;
            $arc->setManga($this);
        }

        return $this;
    }

    public function removeArc(Arcs $arc): self
    {
        if ($this->arcs->contains($arc)) {
            $this->arcs->removeElement($arc);
            // set the owning side to null (unless already changed)
            if ($arc->getManga() === $this) {
                $arc->setManga(null);
            }
        }

        return $this;
    }

    
}
