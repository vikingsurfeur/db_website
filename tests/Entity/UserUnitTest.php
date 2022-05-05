<?php

namespace App\Tests\Entity;

use App\Entity\User;
use App\Entity\Photograph;
use App\Entity\Portfolio;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();
        $photograph = new Photograph();
        $portfolio = new Portfolio();

        $user->setEmail('user@example.com')
            ->setPassword('password')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setGitHub('github.com/user')
            ->setBehance('behance.com/user')
            ->setLinkedin('linkedin.com/user')
            ->addPhotograph($photograph)
            ->addPortfolio($portfolio);

        $this->assertTrue($user->getEmail() === 'user@example.com');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getFirstName() === 'John');
        $this->assertTrue($user->getLastName() === 'Doe');
        $this->assertTrue($user->getGitHub() === 'github.com/user');
        $this->assertTrue($user->getBehance() === 'behance.com/user');
        $this->assertTrue($user->getLinkedin() === 'linkedin.com/user');
        $this->assertTrue($user->getPhotographs()->contains($photograph));
        $this->assertTrue($user->getPortfolios()->contains($portfolio));
    }

    public function testIsFalse(): void
    {
        $user = new User();
        $photograph = new Photograph();
        $portfolio = new Portfolio();

        $user->setEmail('user@example.com')
            ->setPassword('password')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setGitHub('github.com/user')
            ->setBehance('behance.com/user')
            ->setLinkedin('linkedin.com/user')
            ->addPhotograph($photograph)
            ->addPortfolio($portfolio);

        $this->assertFalse($user->getEmail() === 'user@gmail.com');
        $this->assertFalse($user->getPassword() === 'password123');
        $this->assertFalse($user->getFirstName() === 'Johny');
        $this->assertFalse($user->getLastName() === 'Doey');
        $this->assertFalse($user->getGitHub() === 'github.com/user123');
        $this->assertFalse($user->getBehance() === 'behance.com/user123');
        $this->assertFalse($user->getLinkedin() === 'linkedin.com/user123');
        $this->assertFalse($user->getPhotographs()->contains(!$photograph));
        $this->assertFalse($user->getPortfolios()->contains(!$portfolio));
    }

    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getFirstName());
        $this->assertEmpty($user->getLastName());
        $this->assertEmpty($user->getGitHub());
        $this->assertEmpty($user->getBehance());
        $this->assertEmpty($user->getLinkedin());
        $this->assertEmpty($user->getPhotographs());
        $this->assertEmpty($user->getPortfolios());
    }
}