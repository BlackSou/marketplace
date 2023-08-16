<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $sellerCategory = $this->getReference(ProductCategoryFixtures::SELLER_CATEGORY);
        $buyerCategory = $this->getReference(ProductCategoryFixtures::BUYER_CATEGORY);

        $product = (new Product())
            ->setTitle('Meme code')
            ->setDescription('Codes for receiving MEME token allocation')
            ->setStatus(true)
            ->setType('wtb')
            ->setSlug('meme-code')
            ->setImage('https://www.memeland.com/_next/static/media/meme-banner-card.aa47db16.png')
            ->setCategories(new ArrayCollection([$sellerCategory, $buyerCategory]))
            ->setAddDate(new \DateTimeImmutable('2019-04-01'));

        $manager->persist($product);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProductCategoryFixtures::class
        ];
    }

}
