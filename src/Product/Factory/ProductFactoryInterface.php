<?php

namespace Bloodlog\Src\Product\Factory;

use Bloodlog\Src\Product\Entity\ProductInterface;

interface ProductFactoryInterface
{
    public function create(array $array): ProductInterface;
}