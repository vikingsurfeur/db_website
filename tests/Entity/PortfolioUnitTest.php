<?php

namespace App\Tests\Entity;

use App\Entity\Portfolio;
use App\Entity\Photograph;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PortfolioUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $portfolio = new Portfolio();
        $photograph = new Photograph();
        $user = new User();

        $portfolio->setTitle('Photograph title')
            ->setDescription('Description')
            ->setLocation('Location')
            ->setSlug('portfolio')
            ->setSocialNetworkUrl('behance/portfolio')
            ->setPhotographer($user)
            ->addPhotograph($photograph);

        $this->assertTrue($portfolio->getTitle() === 'Photograph title');
        $this->assertTrue($portfolio->getDescription() === 'Description');
        $this->assertTrue($portfolio->getLocation() === 'Location');
        $this->assertTrue($portfolio->getSlug() === 'portfolio');
        $this->assertTrue($portfolio->getSocialNetworkUrl() === 'behance/portfolio');
        $this->assertTrue($portfolio->getPhotographer() === $user);
        $this->assertTrue($portfolio->getPhotographs()->contains($photograph));
    }

    public function testIsFalse(): void
    {
        $portfolio = new Portfolio();
        $photograph = new Photograph();
        $user = new User();

        $portfolio->setTitle('Photograph title')
            ->setDescription('Description')
            ->setLocation('Location')
            ->setSlug('portfolio')
            ->setSocialNetworkUrl('behance/portfolio')
            ->setPhotographer($user)
            ->addPhotograph($photograph);

        $this->assertFalse($portfolio->getTitle() === 'Photograph title2');
        $this->assertFalse($portfolio->getDescription() === 'Description2');
        $this->assertFalse($portfolio->getLocation() === 'Location2');
        $this->assertFalse($portfolio->getSlug() === 'portfolio2');
        $this->assertFalse($portfolio->getSocialNetworkUrl() === 'behance/portfolio2');
        $this->assertFalse($portfolio->getPhotographer() === !$user);
        $this->assertFalse($portfolio->getPhotographs()->contains(!$photograph));
    }

    public function testIsEmpty(): void
    {
        $portfolio = new Portfolio();

        $this->assertEmpty($portfolio->getTitle());
        $this->assertEmpty($portfolio->getDescription());
        $this->assertEmpty($portfolio->getLocation());
        $this->assertEmpty($portfolio->getSlug());
        $this->assertEmpty($portfolio->getSocialNetworkUrl());
        $this->assertEmpty($portfolio->getPhotographer());
        $this->assertEmpty($portfolio->getPhotographs());
    }
}