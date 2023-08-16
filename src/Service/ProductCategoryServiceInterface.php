<?php

namespace App\Service;

use App\DTO\ProductCategoryListResponse;

interface ProductCategoryServiceInterface
{
    public function getCategories(): ProductCategoryListResponse;
}
