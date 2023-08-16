<?php

namespace App\Service;

use App\DTO\ProductListResponse;

interface ProductServiceInterface
{
    public function getProductsByCategory(int $categoryId): ProductListResponse;
}
