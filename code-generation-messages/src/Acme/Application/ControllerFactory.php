<?php declare(strict_types=1);

namespace Acme\Application;

use Acme\Application\OnlineShop\ProductsController;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class ControllerFactory {

    private $dependencies;

    function __construct (Dependencies $dependencies) { $this->dependencies = $dependencies; }

    function productsController (): ProductsController {
        new ProductsController($this->dependencies->productRepository(), $this->dependencies->templatingEngine());
    }
}
