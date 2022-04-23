<?php

namespace App\Entity;

use App\Repository\PortfolioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortfolioRepository::class)]
class Portfolio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $location;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $socialNetworkUrl;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'portfolios')]
    #[ORM\JoinColumn(nullable: false)]
    private $photographer;

    #[ORM\OneToMany(mappedBy: 'portfolio', targetEntity: Photograph::class, orphanRemoval: true)]
    private $photographs;

    public function __construct()
    {
        $this->photographs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSocialNetworkUrl(): ?string
    {
        return $this->socialNetworkUrl;
    }

    public function setSocialNetworkUrl(?string $socialNetworkUrl): self
    {
        $this->socialNetworkUrl = $socialNetworkUrl;

        return $this;
    }

    public function getPhotographer(): ?User
    {
        return $this->photographer;
    }

    public function setPhotographer(?User $photographer): self
    {
        $this->photographer = $photographer;

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
            $photograph->setPortfolio($this);
        }

        return $this;
    }

    public function removePhotograph(Photograph $photograph): self
    {
        if ($this->photographs->removeElement($photograph)) {
            // set the owning side to null (unless already changed)
            if ($photograph->getPortfolio() === $this) {
                $photograph->setPortfolio(null);
            }
        }

        return $this;
    }
}
