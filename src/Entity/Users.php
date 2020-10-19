<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class Users implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Mangas::class, mappedBy="users")
     */
    private $mangas;

    /**
     * @ORM\OneToMany(targetEntity=AdminValidation::class, mappedBy="users")
     */
    private $adminValidations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=ChapitreLikes::class, mappedBy="user")
     */
    private $chapitreLikes;

    /**
     * @ORM\OneToMany(targetEntity=CommentaireChapitres::class, mappedBy="user")
     */
    private $commentaireChapitres;

    /**
     * @ORM\OneToMany(targetEntity=UserCommentaireChapitres::class, mappedBy="user")
     */
    private $userCommentaireChapitres;

    public function __construct()
    {
        $this->mangas = new ArrayCollection();
        $this->adminValidations = new ArrayCollection();
        $this->chapitreLikes = new ArrayCollection();
        $this->commentaireChapitres = new ArrayCollection();
        $this->userCommentaireChapitres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Mangas[]
     */
    public function getMangas(): Collection
    {
        return $this->mangas;
    }

    public function addManga(Mangas $manga): self
    {
        if (!$this->mangas->contains($manga)) {
            $this->mangas[] = $manga;
            $manga->setUsers($this);
        }

        return $this;
    }

    public function removeManga(Mangas $manga): self
    {
        if ($this->mangas->contains($manga)) {
            $this->mangas->removeElement($manga);
            // set the owning side to null (unless already changed)
            if ($manga->getUsers() === $this) {
                $manga->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AdminValidation[]
     */
    public function getAdminValidations(): Collection
    {
        return $this->adminValidations;
    }

    public function addAdminValidation(AdminValidation $adminValidation): self
    {
        if (!$this->adminValidations->contains($adminValidation)) {
            $this->adminValidations[] = $adminValidation;
            $adminValidation->setUsers($this);
        }

        return $this;
    }

    public function removeAdminValidation(AdminValidation $adminValidation): self
    {
        if ($this->adminValidations->contains($adminValidation)) {
            $this->adminValidations->removeElement($adminValidation);
            // set the owning side to null (unless already changed)
            if ($adminValidation->getUsers() === $this) {
                $adminValidation->setUsers(null);
            }
        }

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
            $chapitreLike->setUser($this);
        }

        return $this;
    }

    public function removeChapitreLike(ChapitreLikes $chapitreLike): self
    {
        if ($this->chapitreLikes->contains($chapitreLike)) {
            $this->chapitreLikes->removeElement($chapitreLike);
            // set the owning side to null (unless already changed)
            if ($chapitreLike->getUser() === $this) {
                $chapitreLike->setUser(null);
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
            $commentaireChapitre->setUser($this);
        }

        return $this;
    }

    public function removeCommentaireChapitre(CommentaireChapitres $commentaireChapitre): self
    {
        if ($this->commentaireChapitres->contains($commentaireChapitre)) {
            $this->commentaireChapitres->removeElement($commentaireChapitre);
            // set the owning side to null (unless already changed)
            if ($commentaireChapitre->getUser() === $this) {
                $commentaireChapitre->setUser(null);
            }
        }

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
            $userCommentaireChapitre->setUser($this);
        }

        return $this;
    }

    public function removeUserCommentaireChapitre(UserCommentaireChapitres $userCommentaireChapitre): self
    {
        if ($this->userCommentaireChapitres->contains($userCommentaireChapitre)) {
            $this->userCommentaireChapitres->removeElement($userCommentaireChapitre);
            // set the owning side to null (unless already changed)
            if ($userCommentaireChapitre->getUser() === $this) {
                $userCommentaireChapitre->setUser(null);
            }
        }

        return $this;
    }
}
