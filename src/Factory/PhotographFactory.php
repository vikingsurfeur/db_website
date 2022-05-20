<?php

namespace App\Factory;

use App\Entity\Photograph;
use App\Repository\PhotographRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Photograph>
 *
 * @method static Photograph|Proxy createOne(array $attributes = [])
 * @method static Photograph[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Photograph|Proxy find(object|array|mixed $criteria)
 * @method static Photograph|Proxy findOrCreate(array $attributes)
 * @method static Photograph|Proxy first(string $sortedField = 'id')
 * @method static Photograph|Proxy last(string $sortedField = 'id')
 * @method static Photograph|Proxy random(array $attributes = [])
 * @method static Photograph|Proxy randomOrCreate(array $attributes = [])
 * @method static Photograph[]|Proxy[] all()
 * @method static Photograph[]|Proxy[] findBy(array $attributes)
 * @method static Photograph[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Photograph[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PhotographRepository|RepositoryProxy repository()
 * @method Photograph|Proxy create(array|callable $attributes = [])
 */
final class PhotographFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'title' => self::faker()->word(),
            'photographedAt' => self::faker()->dateTimeBetween('-1 year', 'now'),
            'location' => self::faker()->city(),
            'isLastWorkPortfolio' => self::faker()->boolean(),
            'sellerUrl' => self::faker()->url(),
            'isOnSale' => self::faker()->boolean(),
            'file' => '/placeholder/placeholder_img_landscape.jpg',
        ];
    }

    protected function initialize(): self
    {
        return $this;
    }

    protected static function getClass(): string
    {
        return Photograph::class;
    }
}
