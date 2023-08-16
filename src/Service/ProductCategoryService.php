<?php

namespace App\Service;

use App\DTO\ProductCategoryListItem;
use App\DTO\ProductCategoryListResponse;
use App\Entity\ProductCategory;
use App\Repository\ProductCategoryRepository;
use Doctrine\Common\Collections\Criteria;

class ProductCategoryService implements ProductCategoryServiceInterface
{
    public function __construct(private readonly ProductCategoryRepository $productCategoryRepository)
    {
    }

    public function getCategories(): ProductCategoryListResponse
    {
        $categories = $this->productCategoryRepository->findBy([], ['title' => Criteria::ASC]);
        $items = array_map(
            fn (ProductCategory $productCategory) => new ProductCategoryListItem(
                $productCategory->getId(), $productCategory->getTitle(), $productCategory->getSlug()
            ),
            $categories
        );

        return new ProductCategoryListResponse($items);
    }
}
