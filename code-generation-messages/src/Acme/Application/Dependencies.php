<?php declare(strict_types=1);

namespace Acme\Application;

use Acme\Application\OnlineShop\HardCodedProductRepository;
use Acme\OnlineShop\ProductRepository;
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
}
