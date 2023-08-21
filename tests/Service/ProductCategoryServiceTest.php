<?php

namespace App\Tests\Service;

use App\DTO\ProductCategoryListItem;
use App\DTO\ProductCategoryListResponse;
use App\Entity\ProductCategory;
use App\Repository\ProductCategoryRepository;
use App\Service\ProductCategoryService;
use Doctrine\Common\Collections\Criteria;
use PHPUnit\Framework\MockObject\Exception;
use App\Tests\AbstractBaseTestCase;

class ProductCategoryServiceTest extends AbstractBaseTestCase
{

    /**
     * @throws Exception
     */
    public function testGetCategories(): void
    {
        $randomNumber = mt_rand();
        $category = (new ProductCategory())->setTitle('Test')->setSlug('test');
        $this->setEntityId($category, $randomNumber);
        $repository = $this->createMock(ProductCategoryRepository::class);
        $repository->expects($this->once())
            ->method('findBy')
            ->with([], ['title' => Criteria::ASC])
            ->willReturn([$category]);

        $service = new ProductCategoryService($repository);
        $expected = new ProductCategoryListResponse([new ProductCategoryListItem($randomNumber,'Test', 'test')]);

        $this->assertEquals($expected, $service->getCategories());
    }
}
