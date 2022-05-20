<?php

namespace App\Entity;

use App\Repository\PhotographRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: PhotographRepository::class)]
#[Vich\Uploadable]
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

    #[Vich\UploadableField(mapping: 'images', fileNameProperty: 'file')]
    private ?File $imageFile = null;

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

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
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
