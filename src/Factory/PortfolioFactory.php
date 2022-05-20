<?php

namespace App\Factory;

use App\Entity\Portfolio;
use App\Repository\PortfolioRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Portfolio>
 *
 * @method static Portfolio|Proxy createOne(array $attributes = [])
 * @method static Portfolio[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Portfolio|Proxy find(object|array|mixed $criteria)
 * @method static Portfolio|Proxy findOrCreate(array $attributes)
 * @method static Portfolio|Proxy first(string $sortedField = 'id')
 * @method static Portfolio|Proxy last(string $sortedField = 'id')
 * @method static Portfolio|Proxy random(array $attributes = [])
 * @method static Portfolio|Proxy randomOrCreate(array $attributes = [])
 * @method static Portfolio[]|Proxy[] all()
 * @method static Portfolio[]|Proxy[] findBy(array $attributes)
 * @method static Portfolio[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Portfolio[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PortfolioRepository|RepositoryProxy repository()
 * @method Portfolio|Proxy create(array|callable $attributes = [])
 */
final class PortfolioFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->word(),
            'description' => self::faker()->text(),
            'location' => self::faker()->city(),
            'slug' => self::faker()->word(),
        ];
    }

    protected function initialize(): self
    {
        return $this;
    }

    protected static function getClass(): string
    {
        return Portfolio::class;
    }
}
