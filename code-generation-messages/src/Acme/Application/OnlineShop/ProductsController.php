<?php declare(strict_types=1);

namespace Acme\Application\OnlineShop;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Templating\EngineInterface as TemplatingEngine;
use Zend\Diactoros\Response\HtmlResponse;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class ProductsController {

    private $templating;

    function __construct (TemplatingEngine $templating) { $this->templating = $templating; }

    function handle (RequestInterface $request): ResponseInterface {
        $view = 'OnlineShop/templates/products.html.php';

        return new HtmlResponse($this->templating->render($view));
    }
}
