<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use App\Factory\PortfolioFactory;
use App\Factory\PhotographFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'roles' => ['ROLE_ADMIN'],
        ]);

        PortfolioFactory::createMany(5, [
            'photographer' => UserFactory::first(),
        ]);

        PhotographFactory::createMany(30, [
            'photographer' => UserFactory::first(),
            'portfolio' => PortfolioFactory::random(),
        ]);

        $manager->flush();
    }
}
