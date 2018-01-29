<?php declare(strict_types=1);

namespace Acme\OnlineShop;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class Sku {

    private $sku;

    static function fromString (string $sku): Sku { return new Sku($sku); }

    private function __construct (string $sku) { $this->sku = $sku; }

    function __toString (): string { return $this->sku; }
}
