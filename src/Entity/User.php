<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $firstName;

    #[ORM\Column(type: 'string', length: 255)]
    private $lastName;

    #[ORM\Column(type: 'string', length: 255)]
    private $gitHub;

    #[ORM\Column(type: 'string', length: 255)]
    private $behance;

    #[ORM\Column(type: 'string', length: 255)]
    private $linkedin;

    #[ORM\OneToMany(mappedBy: 'photographer', targetEntity: Photograph::class, orphanRemoval: true)]
    private $photographs;

    #[ORM\OneToMany(mappedBy: 'photographer', targetEntity: Portfolio::class, orphanRemoval: true)]
    private $portfolios;

    public function __construct()
    {
        $this->photographs = new ArrayCollection();
        $this->portfolios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
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
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getGitHub(): ?string
    {
        return $this->gitHub;
    }

    public function setGitHub(string $gitHub): self
    {
        $this->gitHub = $gitHub;

        return $this;
    }

    public function getBehance(): ?string
    {
        return $this->behance;
    }

    public function setBehance(string $behance): self
    {
        $this->behance = $behance;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * @return Collection<int, Photograph>
     */
    public function getPhotographs(): Collection
    {
        return $this->photographs;
    }

    public function addPhotograph(Photograph $photograph): self
    {
        if (!$this->photographs->contains($photograph)) {
            $this->photographs[] = $photograph;
            $photograph->setPhotographer($this);
        }

        return $this;
    }

    public function removePhotograph(Photograph $photograph): self
    {
        if ($this->photographs->removeElement($photograph)) {
            // set the owning side to null (unless already changed)
            if ($photograph->getPhotographer() === $this) {
                $photograph->setPhotographer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, portfolio>
     */
    public function getPortfolios(): Collection
    {
        return $this->portfolios;
    }

    public function addPortfolio(portfolio $portfolio): self
    {
        if (!$this->portfolios->contains($portfolio)) {
            $this->portfolios[] = $portfolio;
            $portfolio->setPhotographer($this);
        }

        return $this;
    }

    public function removePortfolio(portfolio $portfolio): self
    {
        if ($this->portfolios->removeElement($portfolio)) {
            // set the owning side to null (unless already changed)
            if ($portfolio->getPhotographer() === $this) {
                $portfolio->setPhotographer(null);
            }
        }

        return $this;
    }
}
