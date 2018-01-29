<?php declare(strict_types=1);

namespace Acme\OnlineShop;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class ProductDescription {

    private $productDescription;

    static function fromString (string $productDescription): ProductDescription { return new ProductDescription($productDescription); }

    private function __construct (string $productDescription) { $this->productDescription = $productDescription; }

    function __toString (): string { return $this->productDescription; }
}
