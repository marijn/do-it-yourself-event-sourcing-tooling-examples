<?php declare(strict_types=1);

namespace Acme\OnlineShop;

use Countable;
use IteratorAggregate;
use Traversable;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class Products implements Countable, IteratorAggregate {

    private $products;

    function __construct (Product ... $products) { $this->products = $products; }

    function count (): int { return count($this->products); }

    function getIterator (): Traversable {
        foreach ($this->products as $item)
        {
            yield $item;
        }
    }
}
