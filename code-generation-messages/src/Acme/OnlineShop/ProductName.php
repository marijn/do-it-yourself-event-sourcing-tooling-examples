<?php declare(strict_types=1);

namespace Acme\OnlineShop;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class ProductName {

    private $productName;

    static function fromString (string $productName): ProductName { return new ProductName($productName); }

    private function __construct (string $productName) { $this->productName = $productName; }

    function __toString (): string { return $this->productName; }
}
