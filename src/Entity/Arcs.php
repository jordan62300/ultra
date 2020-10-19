<?php

namespace App\Entity;

use App\Repository\ArcsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArcsRepository::class)
 */
class Arcs
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
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity=Mangas::class, inversedBy="arcs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $manga;

    /**
     * @ORM\OneToMany(targetEntity=Chapitres::class, mappedBy="arc")
     */
    private $chapitres;

    public function __construct()
    {
        $this->chapitres = new ArrayCollection();
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

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getManga(): ?Mangas
    {
        return $this->manga;
    }

    public function setManga(?Mangas $manga): self
    {
        $this->manga = $manga;

        return $this;
    }

    /**
     * @return Collection|Chapitres[]
     */
    public function getChapitres(): Collection
    {
        return $this->chapitres;
    }

    public function addChapitre(Chapitres $chapitre): self
    {
        if (!$this->chapitres->contains($chapitre)) {
            $this->chapitres[] = $chapitre;
            $chapitre->setArc($this);
        }

        return $this;
    }

    public function removeChapitre(Chapitres $chapitre): self
    {
        if ($this->chapitres->contains($chapitre)) {
            $this->chapitres->removeElement($chapitre);
            // set the owning side to null (unless already changed)
            if ($chapitre->getArc() === $this) {
                $chapitre->setArc(null);
            }
        }

        return $this;
    }
}
