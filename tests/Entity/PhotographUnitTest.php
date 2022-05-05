<?php

namespace App\Tests\Entity;

use App\Entity\Photograph;
use App\Entity\Portfolio;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PhotographUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $photograph = new Photograph();
        $portfolio = new Portfolio();
        $user = new User();

        $photograph->setTitle('Photograph title')
            ->setPhotographedAt(new \DateTime())
            ->setLocation('Location')
            ->setIsLastWorkPortfolio(true)
            ->setIsOnSale(true)
            ->setSellerUrl('seller/url')
            ->setFile('File')
            ->setPhotographer($user)
            ->setPortfolio($portfolio);

        $this->assertTrue($photograph->getTitle() === 'Photograph title');
        $this->assertTrue($photograph->getPhotographedAt() instanceof \DateTime);
        $this->assertTrue($photograph->getLocation() === 'Location');
        $this->assertTrue($photograph->getIsLastWorkPortfolio() === true);
        $this->assertTrue($photograph->getIsOnSale() === true);
        $this->assertTrue($photograph->getSellerUrl() === 'seller/url');
        $this->assertTrue($photograph->getFile() === 'File');
        $this->assertTrue($photograph->getPhotographer() === $user);
        $this->assertTrue($photograph->getPortfolio() === $portfolio);
    }

    public function testIsFalse(): void
    {
        $photograph = new Photograph();
        $portfolio = new Portfolio();
        $user = new User();

        $photograph->setTitle('Photograph title')
            ->setPhotographedAt(new \DateTime())
            ->setLocation('Location')
            ->setIsLastWorkPortfolio(true)
            ->setIsOnSale(true)
            ->setSellerUrl('seller/url')
            ->setFile('File')
            ->setPhotographer($user)
            ->setPortfolio($portfolio);

        $this->assertFalse($photograph->getTitle() === 'Photograph title2');
        $this->assertFalse($photograph->getPhotographedAt() instanceof User);
        $this->assertFalse($photograph->getLocation() === 'Location2');
        $this->assertFalse($photograph->getIsLastWorkPortfolio() === false);
        $this->assertFalse($photograph->getIsOnSale() === false);
        $this->assertFalse($photograph->getSellerUrl() === 'seller/url2');
        $this->assertFalse($photograph->getFile() === 'File2');
        $this->assertFalse($photograph->getPhotographer() === !$user);
        $this->assertFalse($photograph->getPortfolio() === !$portfolio);
    }

    public function testIsEmpty(): void
    {
        $photograph = new Photograph();

        $this->assertEmpty($photograph->getTitle());
        $this->assertEmpty($photograph->getPhotographedAt());
        $this->assertEmpty($photograph->getLocation());
        $this->assertEmpty($photograph->getIsLastWorkPortfolio());
        $this->assertEmpty($photograph->getIsOnSale());
        $this->assertEmpty($photograph->getSellerUrl());
        $this->assertEmpty($photograph->getFile());
        $this->assertEmpty($photograph->getPhotographer());
        $this->assertEmpty($photograph->getPortfolio());
    }
}