<?php declare(strict_types = 1);

use Acme\Application\AcmeDependencies;
use Zend\Diactoros\ServerRequestFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$dependencies = new AcmeDependencies();
$request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$dispatcher = $dependencies->httpRequestDispatcher();
$emitter = $dependencies->responseEmitter();

$emitter->emit($dispatcher->dispatch($request));
