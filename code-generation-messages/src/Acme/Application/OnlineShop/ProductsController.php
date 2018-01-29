<?php declare(strict_types=1);

namespace Acme\Application\OnlineShop;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class ProductsController {

    function handle (RequestInterface $request): ResponseInterface {
        $view = __DIR__ . '/templates/products.html';

        return new HtmlResponse(file_get_contents($view));
    }
}
