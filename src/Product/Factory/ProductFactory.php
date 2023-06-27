<?php

namespace Bloodlog\Src\Product\Factory;

use Bloodlog\Src\Product\Entity\Product;
use Bloodlog\Src\Product\Entity\ProductInterface;

class ProductFactory implements ProductFactoryInterface
{
    public function create(array $array): ProductInterface
    {
        $product = new Product();
        $product->id = $array['id'];
        $product->name = $array['name'];

        return $product;
    }
}