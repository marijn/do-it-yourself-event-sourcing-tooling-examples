<?php declare(strict_types=1);

namespace Acme\Application;

use Acme\Application\OnlineShop\HardCodedProductRepository;
use Acme\Application\OnlineShop\ProductsController;
use Acme\OnlineShop\ProductRepository;
use FastRoute\Dispatcher as RouteDispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use mindplay\middleman\Delegate;
use Symfony\Component\Templating\EngineInterface as TemplatingEngine;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class Dependencies {

    function templatingEngine (): TemplatingEngine {
        return new PhpEngine(new TemplateNameParser(), new FilesystemLoader([__DIR__.'/%name%']));
    }

    function productRepository (): ProductRepository {
        return new HardCodedProductRepository;
    }

    function router (): RouteDispatcher {
        $productRepository = $this->productRepository();
        $templatingEngine = $this->templatingEngine();

        return simpleDispatcher(function (RouteCollector $routing) use ($productRepository, $templatingEngine)
        {
            $routing->addRoute('GET', '/', new Delegate([new ProductsController($productRepository, $templatingEngine), 'handle']));
        });
    }
}