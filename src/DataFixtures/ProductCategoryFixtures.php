<?php

namespace App\DataFixtures;

use App\Entity\ProductCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductCategoryFixtures extends Fixture
{
    final public const SELLER_CATEGORY = 'wtb';

    final public const BUYER_CATEGORY = 'wts';

    public function load(ObjectManager $manager): void
    {
        $categories = [
            self::SELLER_CATEGORY => (new ProductCategory())->setTitle('WTB')->setSlug('wtb'),
            self::BUYER_CATEGORY => (new ProductCategory())->setTitle('WTS')->setSlug('wts'),
        ];

        foreach ($categories as $category) {
            $manager->persist($category);
        }

        $manager->persist((new ProductCategory())->setTitle('Memeland')->setSlug('memeland'));
        $manager->flush();

        foreach ($categories as $code => $category) {
            $this->addReference($code, $category);
        }
    }
}
