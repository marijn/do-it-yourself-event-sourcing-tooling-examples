<?php declare(strict_types=1);

namespace Acme\OnlineShop;

use Money\Money;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class Product {

    private $name;

    private $description;

    private $sku;

    private $price;

    function __construct (ProductName $name, ProductDescription $description, Sku $sku, Money $price) {
        $this->name = $name;
        $this->description = $description;
        $this->sku = $sku;
        $this->price = $price;
    }

    function name (): ProductName { return $this->name; }

    function description (): ProductDescription { return $this->description; }

    function sku (): Sku { return $this->sku; }

    function price (): Money { return $this->price; }
}
