<?php

namespace App\DTO;

class ProductCategoryListResponse
{
    /**
     * @var ProductCategoryListItem[]
     */
    private array $items;

    /**
     * @param ProductCategoryListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return ProductCategoryListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
