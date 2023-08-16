<?php

namespace App\Service;

use App\DTO\ProductListItem;
use App\DTO\ProductListResponse;
use App\Entity\Product;
use App\Exception\ProductCategoryNotFoundException;
use App\Repository\ProductCategoryRepository;
use App\Repository\ProductRepository;

class ProductService implements ProductServiceInterface
{
    public function __construct(private readonly ProductRepository $productRepository, private readonly ProductCategoryRepository $productCategoryRepository)
    {
    }

    public function getProductsByCategory(int $categoryId): ProductListResponse
    {
        $category = $this->productCategoryRepository->find($categoryId);
        if (!isset($category)) {
            throw new ProductCategoryNotFoundException();
        }

        return new ProductListResponse(array_map(
            [$this, 'map'],
            $this->productRepository->findProductsCategoryId($categoryId)
        ));
    }

    private function map(Product $product): ProductListItem
    {
        return (new ProductListItem())
            ->setId($product->getId())
            ->setTitle($product->getTitle())
            ->setDescription($product->getDescription())
            ->setSlug($product->getSlug())
            ->setStatus($product->getStatus())
            ->setType($product->getType())
            ->setImage($product->getImage())
            ->setAddDate($product->getAddDate()->getTimestamp());
    }

}
