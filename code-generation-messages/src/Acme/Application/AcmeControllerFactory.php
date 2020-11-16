<?php declare(strict_types=1);

namespace Acme\Application;

use Acme\Application\OnlineShop\ProductsController;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class AcmeControllerFactory {

    private $dependencies;

    function __construct (AcmeDependencies $dependencies) { $this->dependencies = $dependencies; }

    function productsController (): ProductsController {
        return new ProductsController($this->dependencies->productRepository(), $this->dependencies->templatingEngine());
    }
}
