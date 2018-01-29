<?php

namespace Acme\Infra\UI;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
interface Controller {

    function handle (RequestInterface $request): ResponseInterface;
}
