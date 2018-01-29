<?php declare(strict_types=1);

namespace Acme\OnlineShop;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
interface ProductRepository {

    function findAllProducts(): Products;
}
