<?php

namespace App\Entity;

use App\Repository\PhotographRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotographRepository::class)]
class Photograph
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'datetime')]
    private $photographedAt;

    #[ORM\Column(type: 'string', length: 255)]
    private $location;

    #[ORM\Column(type: 'boolean')]
    private $isLastWorkPortfolio;

    #[ORM\Column(type: 'boolean')]
    private $isOnSale;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sellerUrl;

    #[ORM\Column(type: 'string', length: 255)]
    private $file;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'photographs')]
    #[ORM\JoinColumn(nullable: false)]
    private $photographer;

    #[ORM\ManyToOne(targetEntity: Portfolio::class, inversedBy: 'photographs')]
    #[ORM\JoinColumn(nullable: false)]
    private $portfolio;

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

    public function getPhotographedAt(): ?\DateTimeInterface
    {
        return $this->photographedAt;
    }

    public function setPhotographedAt(\DateTimeInterface $photographedAt): self
    {
        $this->photographedAt = $photographedAt;

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

    public function getIsLastWorkPortfolio(): ?bool
    {
        return $this->isLastWorkPortfolio;
    }

    public function setIsLastWorkPortfolio(bool $isLastWorkPortfolio): self
    {
        $this->isLastWorkPortfolio = $isLastWorkPortfolio;

        return $this;
    }

    public function getIsOnSale(): ?bool
    {
        return $this->isOnSale;
    }

    public function setIsOnSale(bool $isOnSale): self
    {
        $this->isOnSale = $isOnSale;

        return $this;
    }

    public function getSellerUrl(): ?string
    {
        return $this->sellerUrl;
    }

    public function setSellerUrl(?string $sellerUrl): self
    {
        $this->sellerUrl = $sellerUrl;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

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

    public function getPortfolio(): ?Portfolio
    {
        return $this->portfolio;
    }

    public function setPortfolio(?Portfolio $portfolio): self
    {
        $this->portfolio = $portfolio;

        return $this;
    }
}
