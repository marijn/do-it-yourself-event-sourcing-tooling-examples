<?php declare(strict_types=1);

namespace Acme\Application\OnlineShop;

use Acme\Infra\UI\Controller;
use Acme\OnlineShop\ProductRepository;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Templating\EngineInterface as TemplatingEngine;
use Zend\Diactoros\Response\HtmlResponse;

final class ProductsController implements Controller {

    private $products;
    private $templating;

    function __construct (ProductRepository $products, TemplatingEngine $templating) {
        $this->products = $products;
        $this->templating = $templating;
    }

    function handle (RequestInterface $request): ResponseInterface {
        $allProducts = $this->products->findAllProducts();
        $view = 'OnlineShop/templates/products.html.php';

        return new HtmlResponse($this->templating->render($view, ['products' => $allProducts]));
    }
}
