<?php

namespace App\Tests\Service;

use App\DTO\ProductListItem;
use App\DTO\ProductListResponse;
use App\Entity\Product;
use App\Entity\ProductCategory;
use App\Exception\ProductCategoryNotFoundException;
use App\Repository\ProductCategoryRepository;
use App\Repository\ProductRepository;
use App\Service\ProductService;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{

    public function testGetProductsByCategoryNotFound()
    {
        $randomNumber = mt_rand();
        $productRepository = $this->createMock(ProductRepository::class);
        $categoryRepository = $this->createMock(ProductCategoryRepository::class);
        $categoryRepository->expects($this->once())
            ->method('find')
            ->with($randomNumber)
            ->willThrowException(new ProductCategoryNotFoundException());

        $this->expectException(ProductCategoryNotFoundException::class);

        (new ProductService($productRepository, $categoryRepository))->getProductsByCategory($randomNumber);
    }

    public function testGetProductsByCategory()
    {
        $randomNumber = mt_rand();
        $productRepository = $this->createMock(ProductRepository::class);
        $productRepository->expects($this->once())
            ->method('findProductsCategoryId')
            ->with($randomNumber)
            ->willReturn([$this->createProduct()]);

        $categoryRepository = $this->createMock(ProductCategoryRepository::class);
        $categoryRepository->expects($this->once())
            ->method('find')
            ->with($randomNumber)
            ->willReturn(new ProductCategory());

        $service = new ProductService($productRepository, $categoryRepository);
        $expected = new ProductListResponse([$this->createProductItem()]);

        //TODO Error for App\DTO\ProductListItem::setId()
        $this->assertEquals($expected, $service->getProductsByCategory($randomNumber));
    }

    private function createProduct(): Product
    {
        return (new Product())
            ->setTitle('Meme code')
            ->setDescription('Codes for receiving MEME token allocation')
            ->setStatus(true)
            ->setType('wtb')
            ->setSlug('meme-code')
            ->setImage('https://www.memeland.com/_next/static/media/meme-banner-card.aa47db16.png')
            ->setCategories(new ArrayCollection())
            ->setAddDate(new \DateTimeImmutable('2023-08-20'));
    }

    private function createProductItem(): ProductListItem
    {
        return (new ProductListItem())
            ->setId(mt_rand())
            ->setTitle('Meme code')
            ->setDescription('Codes for receiving MEME token allocation')
            ->setStatus(true)
            ->setType('wtb')
            ->setSlug('meme-code')
            ->setImage('https://www.memeland.com/_next/static/media/meme-banner-card.aa47db16.png')
            ->setAddDate(1692489600);
    }
}
