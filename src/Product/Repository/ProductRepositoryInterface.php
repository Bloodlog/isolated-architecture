<?php

namespace Bloodlog\Src\Product\Repository;

use Bloodlog\Src\Product\Entity\ProductInterface;

interface ProductRepositoryInterface
{
    public function getProductById(int $int): ProductInterface;

    public function save(ProductInterface $product): bool;
}